<?php 

function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

$list_date_available = array(
	
);


$d = date_range(date('Y-m-01'),date('Y-m-t'));
for($i=0;$i<count($d);$i++)
{
	if($i%2==0)
	{
		$arr[] = array(
			'title'=>'avalilable',
			'start'=>$d[$i],
			'color'=>'green'
		);
	}
	else
	{
		$arr[] = array(
			'title'=>'Not avalilable',
			'start'=>$d[$i],
			'color'=>'red'
		);
	}
}

//print "<pre>".print_r($arr,true)."</pre>";die;

echo json_encode($arr);
//echo 'First Date    = ' . date('Y-m-01') . '<br />';
    //echo 'Last Date     = ' . date('Y-m-t')  . '<br />';
?>