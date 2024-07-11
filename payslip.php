<?php
Session_Start();
if(isset($_POST['submit'])){
    $name=$_POST['txtname'];
    $designation=$_POST['Designation'];
    $basic=$_POST['txtsalary'];
    switch($designation){
        case 'Manager':$ca=1000;
                       $ea=500;
                       break;
        case'Supervisor':$ca=750;
                        $ea=200;
                        break;
        case'Clerk':$ca=500;
                    $ea=200;
                    break;
        case'peon':$ca=250;
                    break;
    }
    $hra=$basic*0.25;
    $gross=$basic+$hra+$ca+$ea;
    if($gross<2000)
        $tax=0;
    else if($gross>2000 && $gross<4000)
        $tax=($gross-2000)*0.03;
    else if($gross>4000 && $gross<5000)
        $tax=$gross*0.05;
    else
        $tax=$gross*0.08;
    $net=$gross-$tax;
    echo"<center>
    <table>
        <tr>
            <td>Name</td>
            <td><$txtname></td>
        </tr>
        <tr>
            <td>Designation</td>
            <td>$designation</td>
        </tr>
        <tr>
            <td>Basic Allowance</td>
            <td>$txtsalary></td>
        </tr>
        <tr>
            <td>Conveyance Allowance</td>
            <td>$ca></td>
        </tr>
        <tr>
            <td>Extra Allowance</td>
            <td>$ea></td>
        </tr>
        <tr>
            <td>HRA</td>
            <td>$hra></td>
        </tr>
        <tr>
            <td>Net Salary</td>
            <td>$net></td>
        </tr>
    </table>
    </center>";
}
?>