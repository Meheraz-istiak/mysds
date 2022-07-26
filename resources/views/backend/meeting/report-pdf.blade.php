<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ public_path('bootstrap/css') }}" />
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      #customers tr:nth-child(even){background-color: #f2f2f2;}
      
      #customers tr:hover {background-color: #ddd;}
      
      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }
      </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10" style="margin: 0 auto;">
                <h4 style="text-align: center">MINUTES OF MEETING
                    INAUGURAL SAFETY COMMITTEE MEETING
                </h4>
                <p style="text-align: center;margin:0px">Date:{{ $data->meeting_date }}</p>
                <p style="text-align: center;margin:0px">Time:{{ $data->time }}</p>
                <p style="text-align: center;margin:0px">venue:{{ $data->venue }}</p>
                <p style="margin: 0px 10px">Introduction:</p>
                <p style="margin: 0px 20px">{!! $data->introduction !!}</p>
                <p style="margin: 0px 10px">ENDORSEMENT OF THE PREVIOUS MEETING MINUTES </p>
                <p style="margin: 0px 20px">{!! $data->endorsement !!}</p>
                <div>
                  <h5>Present Member</h5>
   
               @foreach ($data2 as $datas)
                   {{ $datas->p_member}}{{ ','}}
               @endforeach
                 
          
                    
              </div>
            
                <table id="customers">
                    <tr>
                      <th>Agenda</th>
                      <th>PIC</th>
                      <th>Remarks</th>
                    </tr>
                    <tr>
                      <td>                
                          @foreach ($data1 as $value1)
                            <p style="margin: 20px 0px"> {{ $value1->agenda }}</p><br />
                        @endforeach
                    </td>
                      <td>               
                        @foreach ($data1 as $value2)
                            <p style="margin: 20px 0px">{{ $value2->pic }}</p><br />
                        @endforeach</td>
                      <td>
                        @foreach ($data1 as $value3)
                            <p>{{ $value3->remarks }}</p>
                        @endforeach
                      </td>
                    </tr>
                  </table>
                <p>Closing </p>
                <p style="margin: 0px 10px">{!! $data->closing !!}</p>
                    <table>
                        <tr>
                            <td style="float:right">                        
                                <h4>Prepared by</h4>
                                <br>
                                <br>
                                ------------------------------------------
                                <h4> (Mr. Renato De Oliveira- GM )</h4>
                                <p style="margin: 0px 10px">chairman</p></td>
                            <td style="float:right">
                                <h4>Reviewed and Approved by:</h4>
                                <br>
                                <br>
                                ------------------------------------------
                                <h4> (Mr. Renato De Oliveira- GM )</h4>
                                <p style="margin: 0px 10px">chairman</p></td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
    <script src="{{ public_path('bootstrap/js') }}"></script>
</body>
</html>
