/*!
 DataTables Bootstrap 3 integration
 ©2011-2015 SpryMedia Ltd - datatables.net/license
*/
(function(b){"function"===typeof define&&define.amd?define(["jquery","datatables.net"],function(a){return b(a,window,document)}):"object"===typeof exports?module.exports=function(a,d){a||(a=window);if(!d||!d.fn.dataTable)d=require("datatables.net")(a,d).$;return b(d,a,a.document)}:b(jQuery,window,document)})(function(b,a,d,m){var f=b.fn.dataTable;b.extend(!0,f.defaults,{dom:"<'row'<'col-sm-6'l><'col-sm-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",renderer:"bootstrap"});b.extend(f.ext.classes,
{sWrapper:"dataTables_wrapper form-inline dt-bootstrap",sFilterInput:"form-control input-sm",sLengthSelect:"form-control input-sm",sProcessing:"dataTables_processing"});f.ext.renderer.pageButton.bootstrap=function(a,h,r,s,j,n){var o=new f.Api(a),t=a.oClasses,k=a.oLanguage.oPaginate,u=a.oLanguage.oAria.paginate||{},e,g,p=0,q=function(d,f){var l,h,i,c,m=function(a){a.preventDefault();!b(a.currentTarget).hasClass("disabled")&&o.page()!=a.data.action&&o.page(a.data.action).draw("page")};
l=0;for(h=f.length;l<h;l++)if(c=f[l],b.isArray(c))q(d,c);else{g=e="";switch(c){case "ellipsis":e="&#x2026;";g="disabled";break;case "first":e=k.sFirst;g=c+(0<j?"":" disabled");break;case "previous":e=k.sPrevious;g=c+(0<j?"":" disabled");break;case "next":e=k.sNext;g=c+(j<n-1?"":" disabled");break;case "last":e=k.sLast;g=c+(j<n-1?"":" disabled");break;default:e=c+1,g=j===c?"active-paging":""}e&&(i=b("<li>",{"class":t.sPageButton+" "+g,id:0===r&&"string"===typeof c?a.sTableId+"_"+c:null}).append(b("<a>",{href:"#",
"aria-controls":a.sTableId,"aria-label":u[c],"data-dt-idx":p,tabindex:a.iTabIndex}).html(e)).appendTo(d),a.oApi._fnBindAction(i,{action:c},m),p++)}},i;try{i=b(h).find(d.activeElement).data("dt-idx")}catch(v){}q(b(h).empty().html('<ul class="pagination modif-1"/>').children("ul"),s);i!==m&&b(h).find("[data-dt-idx="+i+"]").focus()};return f});

(function ($) {
    function calcDisableClasses(oSettings) {
        var start = oSettings._iDisplayStart;
        var length = oSettings._iDisplayLength;
        var visibleRecords = oSettings.fnRecordsDisplay();
        var all = length === -1;
 
        // Gordey Doronin: Re-used this code from main jQuery.dataTables source code. To be consistent.
        var page = all ? 0 : Math.ceil(start / length);
        var pages = all ? 1 : Math.ceil(visibleRecords / length);
 
        var disableFirstPrevClass = (page > 0 ? '' : oSettings.oClasses.sPageButtonDisabled);
        var disableNextLastClass = (page < pages - 1 ? '' : oSettings.oClasses.sPageButtonDisabled);
 
        return {
            'first': disableFirstPrevClass,
            'previous': disableFirstPrevClass,
            'next': disableNextLastClass,
            'last': disableNextLastClass
        };
    }
 
    function calcCurrentPage(oSettings) {
        return Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
    }
 
    function calcPages(oSettings) {
        return Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength);
    }
 
    var firstClassName = 'first';
    var previousClassName = 'previous';
    var nextClassName = 'next';
    var lastClassName = 'last';
 
    var paginateClassName = 'paginate';
    var paginatePageClassName = 'paginate_page';
    var paginateInputClassName = 'paginate_input';
    var paginateTotalClassName = 'paginate_total';
 
    $.fn.dataTableExt.oPagination.input = {
        'fnInit': function (oSettings, nPaging, fnCallbackDraw) {
            var nFirst = document.createElement('span');
            var nPrevious = document.createElement('span');
            var nNext = document.createElement('span');
            var nLast = document.createElement('span');
            var nInput = document.createElement('input');
            var nTotal = document.createElement('span');
            var nInfo = document.createElement('span');
 
            var language = oSettings.oLanguage.oPaginate;
            var classes = oSettings.oClasses;
            var info = language.info || 'Page _INPUT_ of _TOTAL_';
 
            nFirst.innerHTML = language.sFirst;
            nPrevious.innerHTML = language.sPrevious;
            nNext.innerHTML = language.sNext;
            nLast.innerHTML = language.sLast;
 
            nFirst.className = firstClassName + ' ' + classes.sPageButton;
            nPrevious.className = previousClassName + ' ' + classes.sPageButton;
            nNext.className = nextClassName + ' ' + classes.sPageButton;
            nLast.className = lastClassName + ' ' + classes.sPageButton;
 
            nInput.className = paginateInputClassName;
            nTotal.className = paginateTotalClassName;
 
            if (oSettings.sTableId !== '') {
                nPaging.setAttribute('id', oSettings.sTableId + '_' + paginateClassName);
                nFirst.setAttribute('id', oSettings.sTableId + '_' + firstClassName);
                nPrevious.setAttribute('id', oSettings.sTableId + '_' + previousClassName);
                nNext.setAttribute('id', oSettings.sTableId + '_' + nextClassName);
                nLast.setAttribute('id', oSettings.sTableId + '_' + lastClassName);
            }
 
            nInput.type = 'text';
 
            info = info.replace(/_INPUT_/g, '</span>' + nInput.outerHTML + '<span>');
            info = info.replace(/_TOTAL_/g, '</span>' + nTotal.outerHTML + '<span>');
            nInfo.innerHTML = '<span>' + info + '</span>';
 
            nPaging.appendChild(nFirst);
            nPaging.appendChild(nPrevious);
            $(nInfo).children().each(function (i, n) {
                nPaging.appendChild(n);
            });
            nPaging.appendChild(nNext);
            nPaging.appendChild(nLast);
 
            $(nFirst).click(function() {
                var iCurrentPage = calcCurrentPage(oSettings);
                if (iCurrentPage !== 1) {
                    oSettings.oApi._fnPageChange(oSettings, 'first');
                    fnCallbackDraw(oSettings);
                }
            });
 
            $(nPrevious).click(function() {
                var iCurrentPage = calcCurrentPage(oSettings);
                if (iCurrentPage !== 1) {
                    oSettings.oApi._fnPageChange(oSettings, 'previous');
                    fnCallbackDraw(oSettings);
                }
            });
 
            $(nNext).click(function() {
                var iCurrentPage = calcCurrentPage(oSettings);
                if (iCurrentPage !== calcPages(oSettings)) {
                    oSettings.oApi._fnPageChange(oSettings, 'next');
                    fnCallbackDraw(oSettings);
                }
            });
 
            $(nLast).click(function() {
                var iCurrentPage = calcCurrentPage(oSettings);
                if (iCurrentPage !== calcPages(oSettings)) {
                    oSettings.oApi._fnPageChange(oSettings, 'last');
                    fnCallbackDraw(oSettings);
                }
            });
 
            $(nPaging).find('.' + paginateInputClassName).keyup(function (e) {
                // 38 = up arrow, 39 = right arrow
                if (e.which === 38 || e.which === 39) {
                    this.value++;
                }
                // 37 = left arrow, 40 = down arrow
                else if ((e.which === 37 || e.which === 40) && this.value > 1) {
                    this.value--;
                }
 
                if (this.value === '' || this.value.match(/[^0-9]/)) {
                    /* Nothing entered or non-numeric character */
                    this.value = this.value.replace(/[^\d]/g, ''); // don't even allow anything but digits
                    return;
                }
 
                var iNewStart = oSettings._iDisplayLength * (this.value - 1);
                if (iNewStart < 0) {
                    iNewStart = 0;
                }
                if (iNewStart >= oSettings.fnRecordsDisplay()) {
                    iNewStart = (Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength) - 1) * oSettings._iDisplayLength;
                }
 
                oSettings._iDisplayStart = iNewStart;
                oSettings.oInstance.trigger("page.dt", oSettings);
                fnCallbackDraw(oSettings);
            });
 
            // Take the brutal approach to cancelling text selection.
            $('span', nPaging).bind('mousedown', function () { return false; });
            $('span', nPaging).bind('selectstart', function() { return false; });
 
            // If we can't page anyway, might as well not show it.
            // var iPages = calcPages(oSettings);
            // if (iPages <= 1) {
            //     $(nPaging).hide();
            // }
        },
 
        'fnUpdate': function (oSettings) {
            if (!oSettings.aanFeatures.p) {
                return;
            }
 
            var iPages = calcPages(oSettings);
            var iCurrentPage = calcCurrentPage(oSettings);
 
            var an = oSettings.aanFeatures.p;
            // if (iPages <= 1) // hide paging when we can't page
            // {
            //     $(an).hide();
            //     return;
            // }
 
            var disableClasses = calcDisableClasses(oSettings);
 
            $(an).show();
 
            // Enable/Disable `first` button.
            $(an).children('.' + firstClassName)
                .removeClass(oSettings.oClasses.sPageButtonDisabled)
                .addClass(disableClasses[firstClassName]);
 
            // Enable/Disable `prev` button.
            $(an).children('.' + previousClassName)
                .removeClass(oSettings.oClasses.sPageButtonDisabled)
                .addClass(disableClasses[previousClassName]);
 
            // Enable/Disable `next` button.
            $(an).children('.' + nextClassName)
                .removeClass(oSettings.oClasses.sPageButtonDisabled)
                .addClass(disableClasses[nextClassName]);
 
            // Enable/Disable `last` button.
            $(an).children('.' + lastClassName)
                .removeClass(oSettings.oClasses.sPageButtonDisabled)
                .addClass(disableClasses[lastClassName]);
 
            // Paginate of N pages text
            $(an).find('.' + paginateTotalClassName).html(iPages);
 
            // Current page number input value
            $(an).find('.' + paginateInputClassName).val(iCurrentPage);
        }
    };
})(jQuery);