<?php

include('config.php');
$name = $_REQUEST["name"];
$tel = $_REQUEST["tel"];
$address = $_REQUEST["address"];

?>
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>PrineSendPost</title>
        <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
    </head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@400&display=swap');
        .pagebreak {
        clear: both;
        page-break-after: always;
    } 
    @media print {
        #printPageButton {
          display: none;
        }
      }
    
    @page { size: 150mm 115mm;margin:0 } 
    body { width: 150mm; height: 115mm;margin:0;padding-left:2mm;padding-right:5mm;padding-top:1mm } 
    @media print {
          section {page-break-after: always; clear: both;margin:0;padding:0mm}
    }
         section {page-break-after: always; clear: both;margin:0;padding-left:0mm}
      
            *{
                font-family: 'Prompt', sans-serif;
            }
        .cell {
        background: #ccc;
        }
        .td {
        padding: 5px;
        }
        .right {
        text-align: right;
        }
        .center {
        text-align: center;
        
        }
        .border-top {
        border-top: #000 1px solid;
        }
        .border-bottom {
        border-bottom: #000 1px solid;
        }
        .border-left {
        border-left: #000 1px solid;
        }
        .border-right {
        border-right: #000 1px solid;
        }
        .border-collapse{
            border-collapse: collapse;
            border: 1px solid black;
        }
        .border-div{
            border: 1px solid black;
        }
        .pading-bottom{
            margin-bottom:5px;
        }
        .box-primary,.form-control {
            border: 1px solid black;
        }
        .right-bottom{
            border-right: #000 1px solid;
            border-bottom: #000 1px solid;

        }
    </style>       
    <body>  
    <body onload='window.print()'>
        <table width='120%'>
        <button id='printPageButton' onClick='window.print();'>Print</button>
            <td>
                    <table class='border-collapse' border='1' width='100%'>
                        <tr>
                            <td width='50%'    style='padding-top:5px; padding-left:5px; padding-bottom:5px; font-size:20px; text-align:center'><strong>ผู้ส่ง </strong> </td>
                            <td width='50%'    style='padding-top:5px; padding-left:5px; padding-bottom:5px; font-size:20px; text-align:center'><strong>ผู้รับ </strong> </td>
                        </tr>
                            <td colspan='1' style="padding-left:12px;">
                                <table style="font-size:16x;">
                                    <div>
                                        NAME : 
                                        <span>
                                            Folk MiNi Mart (สำนักงานใหญ่)
                                        </span>
                                    </div>
                                        </br>
                                    <div>
                                        PHONE : 
                                        <span>
                                       045-499-7401
                                        </span>
                                    </div>
                                        </br>
                                    <div style="width='80px;'">
                                        ADDRESS
                                    </div>
                                    <span>
                                       บ้านเเละสวนอุบล . . . 
                                    </span>
                                </table>
                                
                            </td>
                            <td colspan='1' style="padding-left:12px;">
                                <table style="font-size:16px;">
                                    <div>
                                        NAME : 
                                        <span>
                                            <?php echo  $name ?>
                                        </span>
                                    </div>
                                        </br>
                                    <div>
                                        PHONE : 
                                        <span>
                                        <?php echo  $tel?>
                                        </span>
                                    </div>
                                        </br>
                                    <div style="width='80px;'">
                                        ADDRESS
                                    </div>
                                    <span>
                                        <?php echo $address ?>
                                    </span>
                                </table>
                            </td>
                    </table>
                </td>
            </tr>       
        </table>
        <table  width='120%'>
            <tr>
                <td width='50%'>
                    <table class='border-collapse' border='1' width='100%'>
                        <tr>
                            <td width='50%'    style='padding-top:5px; padding-left:5px; padding-bottom:5px;   font-size:18px; text-align:center'>
                                <strong>DESCRIPTION</strong>
                            </td>
                            <td>
                            &nbsp;
                            <?php  
                            echo 'หมายเหตุ';
                            ?>   
                            </td>
                        </tr>    
                        <tr>
                            <td colspan='2'>
                                <table width='100%' style='font-size:16px'>
                                    <tr>
                                        <td  style='text-align:center'>
                                        <div>&nbsp;</div>
                                            <?php  
                                                echo $remark;
                                            ?>
                                            <div>&nbsp;</div>

                                        </td>
                                    </tr>                   
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width='45%'>
                    <table class='border-collapse' border='1' width='100%'>
                        <tr>
                            <td width='40%'  style='padding-top:5px; padding-left:5px; padding-bottom:5px;   font-size:18px; text-align:center'>
                                <strong>PAYMENT</strong>
                            </td>
                            <td style='text-align:right; font-size:16px; margin-right:5px'>
                                <?php 
                                if($payment == 'credit'){
                                    $total_bill = number_format($total - $discount - $matjam,2);
                                    $pay_text = 'ค้างชำระ' .'&nbsp;'. $total_bill.'บาท';     
                                    echo $pay_text;
                                }if($payment == 'cash'){
                                    $total_bill = $total - $discount;         
                                    $pay_text = 'ชำระเเล้ว';
                                    echo $pay_text;
                                }
                                //  echo 
                                ?>
                                &nbsp;
                            </td>
                        </tr>    
                        <tr>
                            <td class="pagebreak" colspan='2'>
                                <table width='100%'>
                                    <tr>
                                        <td style='text-align:center;font-size:16px;'>
                                        <div>&nbsp;</div>
                                            <?php 
                                            if($payment == 'credit'){
                                                echo 'ค้างชำระ';
                                            }if($payment == 'cash'){
                                                echo 'ชำระเเล้วเงินสด';
                                            }
                                                // echo $payment ; 
                                            ?>
                                            <div>&nbsp;</div>
                                        </td>
                                    </tr>                   
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>    
        <!-- <table class='border-collapse' border='1' width='120%'>
            <tr>
                <td width='20%' style='padding-top:5px; padding-left:5px; padding-bottom:5px; font-size:20px; text-align:center'>
                    <div class="pull-right">
                        <img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=<?php echo $website?>" title="Link to my Website" />
                    </div> 
                </td>
                <td width='20%' style='padding-top:5px; padding-left:5px; padding-bottom:5px; font-size:20px; text-align:center'>
                    <div class="pull-right">
                        <img src="<?php echo $host ?>/uploads_logo/<?php echo $logo ?>"  width="70%" height="70%"title="Link to my Website" />
                    </div> 
                </td>
                <td width='70%'>

                <svg class="barcode"
                    jsbarcode-value="<?php echo $inv_code?>">
                </svg>
                <script type="text/javascript">
                    JsBarcode(".barcode").init();   
                </script>                                                   
                </td>
            </tr>
        </table>     -->
    </body>
    </html>

    <?php
    echo $html;
?>