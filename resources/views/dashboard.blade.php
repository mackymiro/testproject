@extends('layouts.app')
@section('title',  'Test Project')
@section('content')
<main role="main" class="container">
  <div class="jumbotron">
        <div class="form-group">    
            <div class="form-row">
                <div class="col-lg-4">
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
                     <button type="submit" onclick=addComments() class="btn btn-primary btn-lg">Add Comments</button>
                </div>
               
            </div>
        </div>

       
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>

    const addComments = () =>{
        alert('test');

    }
</script>
@endsection