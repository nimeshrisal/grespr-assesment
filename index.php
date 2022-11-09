<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Assesment</title>
    <h4 style="text-align: center; color:deepskyblue;"> GRESPR ASSESMENT </h4>
</head>

    <body><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="value">Q.1.  Enter any character or number to check its type:<br></label>
                    <form  action="functions.php" method="GET" id="form-1" enctype=”multipart/form-data” class="form-inline">
                        <div class="form-group">
                            <input class="form-control mx-sm-3" type="text" id="data" name="val" placeholder="Enter any character"><br>
                            <button type="submit" class="btn btn-primary mx-sm-3">Submit</button>
                        </div><br>
                        <div id="result-1" style="color:red;">

                        </div><br><br>
                    </form>
                </div>
            <!-- </div>
            <div class="row"> -->
                <div class="col-md-6">
                    <label for="">Q.2.  Enter float value and precision for flooring:</label>
                    <form class="form-inline" action="floor.php" method="GET" id="form-2" enctype=”multipart/form-data”>
                        <div class="form-group">
                            <input class="form-control mx-sm-3" type="text" id="float" name="float-value" placeholder="Enter value">&nbsp;
                            <input class="form-control mx-sm-3" type="text" id="precision" name="precision-value" placeholder="Enter precision">
                            <button type="submit" class="btn btn-primary mx-sm-3">Submit</button>
                        </div><br>
                        <div id="result-2" style="color:red;">

                        </div><br><br>
                    </form>
                </div>
            <!-- </div>
            <div class="row"> -->
                <div class="col-md-6">
                    <label for="">Q.3. Write a code or function to display dates in provided format :</label>
                    <form action="date.php" method="GET" id="form-3" enctype=”multipart/form-data” class="form-inline">
                        <div class="form-group">
                            <input class ="form-control mx-sm-3" type="text" id="date" name="date" placeholder="Enter date">
                            <button type="submit" class="btn btn-primary mx-sm-3">Submit</button>
                        </div><br>
                        <div id="result-3" style="color:red;">

                        </div><br><br>
                    </form>
                </div>
                <div class="col-md-6">
                    <label for="">Q.4. REGEX :</label>
                    <form action="" method="" id="form-4" enctype=”multipart/form-data” class="form-inline">
                        <div class="form-group">
                            <input class ="form-control mx-sm-3" type="text" id="pattern" name="pattern" placeholder="Regular Expression">
                            <input class ="form-control mx-sm-3" type="text" id="inputdata" name="inputdata" placeholder="Test String">
                            <!-- <button type="submit" class="btn btn-primary mx-sm-3">Submit</button> -->
                        </div><br>
                        <div id="result-4" style="color:red;">

                        </div><br><br>
                    </form>
                </div>
                <div class="col-md-6">
                    <label for="">Q.5. web crawler :</label>
                    <form action="crawler.php" method="POST" id="form-5" enctype=”multipart/form-data” class="form-inline">
                        <div class="form-group">
                            <!-- <input class ="form-control mx-sm-3" type="text" id="pattern" name="pattern" placeholder="Regular Expression">
                            <input class ="form-control mx-sm-3" type="text" id="inputdata" name="inputdata" placeholder="Test String"> -->
                            <button type="button" class="btn btn-primary mx-sm-3" onclick="show(event)">Click here to get data </button>
                        </div><br>
                        <div id="result-5" style="color:red;">

                        </div><br><br>
                    </form>
                </div>
                <div class="col-md-6">
                    <label for="">Q.6. Create a CSV file :</label>
                    <form action="csv.php" method="POST" id="form-6" enctype=”multipart/form-data” class="form-inline">
                        <div class="form-group">
                            <!-- <input class ="form-control mx-sm-3" type="text" id="pattern" name="pattern" placeholder="Regular Expression">
                            <input class ="form-control mx-sm-3" type="text" id="inputdata" name="inputdata" placeholder="Test String"> -->
                            <button type="button" class="btn btn-primary mx-sm-3" onclick="storeCsv(event)">Click here to create a CSV file </button>
                        </div><br>
                        <div id="result-6" style="color:red;">

                        </div><br><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        $('#form-1').on('submit',function(e){
            e.preventDefault();
            var val = $('#data').val();
            var url = $(this).attr('action');
            // console.log(val);
            $.ajax({
                type: 'GET',
                url : url,
                dataType: 'json',
                data: {
                    'val' : val
                },
                success: function(data){
                    
                    // console.log(data);
                    if(data == true){
                        app = val +" is a integer value";
                       $('#result-1').html("Answer: "+app); 
                    }else{
                        $('#result-1').html("Answer:"+ data);
                    }
                }
            })
        })
    })
    $(function(){
        $('#form-2').on('submit',function(e){
            e.preventDefault();
            var val = $('#float').val();
            var precision = $('#precision').val();
            var url = $(this).attr('action');
            // console.log(val,precision);
            $.ajax({
                type: 'GET',
                url : url,
                dataType: 'json',
                data: {
                    'val' : val,
                    'precision': precision
                },
                success: function(data){
                    
                    console.log(data);
                    if(data){
                       $('#result-2').html("Answer: "+data); 
                    }else{
                        $('#result-2').html('Invalid Input');
                    }
                }
            })
        })
    })
    $(function(){
        $('#form-3').on('submit',function(e){
            e.preventDefault();
            // var val = $('#float').val();
            var date = $('#date').val();
            var url = $(this).attr('action');
            // console.log(val,precision);
            $.ajax({
                type: 'GET',
                url : url,
                dataType: 'json',
                data: {
                    'date': date
                },
                success: function(data){
                    
                    console.log(data);
                    if(data){
                        $('#result-3').html("The answer date is: "+data); 
                    }else{
                        $('#result-3').html('Invalid Input please give proper value');
                    }
                }
            })
        })
    })
    $(function(){
        $('#pattern,#inputdata').on('change keyup',function(e){
            // e.preventDefault();
            var pattern = $('#pattern').val();
            var ipdata = $('#inputdata').val();
            var url = 'filter.php';
            // console.log(data,pattern)
            if(ipdata == "" && pattern != "")
           {
               $('#result-4').html('Expression added');
           }
            if(pattern != "" || ipdata != ""){

                $.ajax({
                    type: 'GET',
                    url : url,
                    dataType: 'json',
                    data: {
                        'pattern': pattern,
                        'data' : ipdata
                    },
                    success: function(data){
                        // console.log(data.result);
    
                        if(data.result){
                            $('#result-4').html("No. of matced string = "+data.result+"<br> array = ["+data.result_array+"]"); 
                        }
                         
                            // else{
                            //     $('#result-4').html('Invalid input');
                            // }
                    }
                })
            }else{
                $('#result-4').html(' ');
            }
        })
    })

function show(event){
    event.preventDefault();
    var url = $('#form-5').attr('action');
    // window.location(url);
    // console.log(url);
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'JSON',
        success: function(data){
            if(data.success == true){
                $('#result-5').html("The file has been saved to Root Directory! Please check the root directory");
            };
        },
    });
}
function storeCsv(event){
    event.preventDefault();
    // console.log('hello');
    var url = $('#form-6').attr('action');
    // window.location(url);
    // console.log(url);
    $.ajax({
        url: url,
        dataType: 'JSON',
        success: function(data){
            if(data){

                $('#result-6').html("The file has been saved to Root Directory! Please check the root directory");
                
            };
        },
    });
}
</script>