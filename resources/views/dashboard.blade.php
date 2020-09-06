@extends('layouts.app')
@section('title',  'Test Project')
@section('content')
<main role="main" class="container">
  <div class="jumbotron">
        <div class="form-group">    
            <div class="form-row">
                <div class="col-lg-4">
                      <div id="validateField" class="alert alert-danger"><p>Field is required</p></div>
                      <h1>Comment Here</h1>
                      <label>Name:</label>
                      <input type="text" id="yourName" name="yourName" class="form-control" required />
                </div>
               
            </div>
        </div>
        <div class="form-group">    
            <div class="form-row">
                <div class="col-lg-4">
                      <label>Comments:</label>
                      <input type="text" id="comments" name="comments" class="form-control" required />
                </div>
               
            </div>
        </div>

        <div class="form-group">    
            <div class="form-row">
                <div class="col-lg-4">
                     <button type="button" onclick="addComments()" class="btn btn-primary btn-lg">Add Comments</button>
                </div>
               
            </div>
        </div>

       
  </div>
  <div class="row">
          <table  id="output" class="table table-striped">
                 <thead>
                    <th class="bg-success" style="color:#ffff">DATE</th>
                    <th class="bg-success" style="color:#ffff">NAME</th>
                    <th class="bg-success" style="color:#ffff">COMMENTS</th>
                    <th class="bg-success" style="color:#ffff">ACTION</th>
                </thead>
                <tbody id="rows">
                    <tr> 
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                </tbody>
                
          </table>
          <p id="addReply">Add Reply<br>
                <label>Your Name</label>
             
                <input type="text" id="replyName" name="replyName" class="form-control" />
                <label>Comments</label>
                <input type="text" id="replyComments" name="replyComments" class="form-control" />
                <br>
              
                <button type="button" onclick="addReply()" class="btn btn-primary btn-lg">Add Reply</button>
          </p>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    $("#validateField").hide();
    $("#addReply").hide();

    const addReply = () => {
        const replyDate = "<?php echo date("Y-m-d"); ?>";
        const replyName = $("#replyName").val();
        const replyComment = $("#replyComments").val();
        
    }


    const toggle = (id) =>{
        $("#addReply").show();
     
    }

    const addComments = () =>{
        
        const date = "<?php echo date("Y-m-d"); ?>";
        const yourName = $("#yourName").val();
        const comments = $("#comments").val();

        if(yourName.length === 0 || comments.length === 0){
            $("#validateField").fadeIn().delay(3000).fadeOut();
        }else{
        
           //make ajax call
          $.ajax({
                type:'POST',
                url:'/dashboard/add-comments',
                data:{
                    _method:'post',
                    "_token":"{{ csrf_token() }}",
                    "date":date,
                    "yourName":yourName,
                    "comments":comments,
                },
                success:function(data){
                    console.log(data);

                    const table =  document.getElementById("output");
                    const row = document.createElement("tr");
                    
                    const date1 = row.insertCell(0);
                    const yourName1 = row.insertCell(1);
                    const comments1 = row.insertCell(2);
                    const reply = row.insertCell(3);
                 
                    date1.innerHTML = `${date}`;
                    yourName1.innerHTML = `${yourName}`;
                    comments1.innerHTML = `${comments}`;
                    reply.innerHTML = `<a id="ids-${data}" data-
                    ="${data}" onclick="toggle(${data})"  href='JavaScript:Void(0)' >Reply</a>`;
        

                    row.append(date1);
                    row.append(yourName1);
                    row.append(comments1);
                    row.append(reply);
                    document.getElementById("rows").appendChild(row);

                    
                },
                error:function(data){
                    console.log('Error', data);
                },
                
          });
        }

    }

  
</script>
@endsection