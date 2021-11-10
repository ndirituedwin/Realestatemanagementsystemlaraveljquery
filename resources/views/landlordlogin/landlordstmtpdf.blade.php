<!DOCTYPE html>
<html>
     <head>
         <title>tenant_stmt_pdf</title>
         {{-- <link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}"> --}}

             <style type="tex/css">
            /* .container2{
                margin-top: -20px;
                margin-left: 200px;
            }

            .tenantname{
                margin-left:200px;
                margin-top: -100px
            } */
            /* .stmttenant th{
                border-bottom: 1px solid rgb(161, 168, 161);
                width: 40%;
                width: 20%;
                margin-right:1%
            
            .stmtrow td{
                border-bottom: 1px solid rgb(116, 116, 116);
                text-align: center;
                font-size:15px
            } */

             /* .content-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                }

                .content-table thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
                font-weight: bold;
                }

                .content-table th,
                .content-table td {
                padding: 12px 15px;
                }
                .content-table,tr,th{
                border-bottom: 1px solid black; */

                /* }

                .content-table tbody tr {
                border-bottom: 1px solid #dddddd;
                }
                .content-table tbody tr td {
                border-bottom: 1px solid #dddddd;
                } */

                /* .content-table tbody tr:nth-of-type(even) { */
                /* background-color: #f3f3f3; */
                /* } */

                /* .content-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
                }

                .content-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
                } */
                    .content-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                width:100%;
                min-width: 400px;
                border-radius: 5px 5px 0 0;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                }

                .content-table thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
                 font-weight: bold;
                }
               .stmttenant, th{
                    border-bottom: 1px solid blck;
                }

               /*  .content-table th,
                .content-table td {
                padding: 12px 15px;
                }*/

                .content-table tbody tr {
                border-bottom: 1px solid #dddddd;
                }
               .content-table tbody tr td {
                border-bottom: 1px solid #dddddd;
                    text-align: center;

                }

                .content-table tbody tr:nth-of-type(even) {
                }

                .content-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
                }
                .content-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
                }

            </style>

        </head>
     <body>




            <div class="container4">
                <table  class="content-table">

                    <tr class="stmttenant">
                        <th>Unit</th><th>Tenant</th><th>Payable</th><th>Amount</th><th>ReceiptNo</th><th>RegNo</th><th>Payment Date</th><th>Payment Type</th>

                    </tr>
                     <tbody>
                        @if (empty($statements))
                               <center><p style="margin-top:30px">No data available</p></center>
                               @else
                         @foreach ($statements as $statement)
                             <tr class="stmtrow">
                                <td>{{$statement['Unit']}}</td>
                                <td>{{$statement['Tenant']}}</td>
                                <td>{{$statement['Payable']}}</td>
                                <td>{{$statement['AmountPaid']}}</td>
                             <td>{{$statement['ReceiptNo']}}</td>
                             <td>{{$statement['RefNo']}}</td>
                             {{-- <td></td> --}}
                             <td>{{$statement['Payment Date']}}</td>
                             <td>{{$statement['paymenttype']}}</td>
                             </tr>
                             @endforeach
                             @endif


                     </tbody>
                </table>
            </div>
     </body>
</html>
