<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <title>Ddddd</title>
</head>
<body>
          <div class="container">
                    <div class="row">
                              <div class="col-lg-8">
                              <h3 class="text-center">Form</h3>
                              @if ($errors->any())
                              <div class="alert alert-danger">
                              <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                              </ul>
                              </div>
                              @endif
                              @if(session()->has('xabar')) 
                              <div class="alert alert-success"> 
                                        {{ session()->get('xabar') }} 
                              </div> 
                              @endif

                              <form action="/check" method="post" enctype="multipart/form-data">
                              @csrf  
                                        <div class="form-group">
                                        <label for="exampleFormControlInput1">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">          
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleFormControlInput1">Phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                                        </div>
                              
                                        <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Comment</label>
                                        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-success">Success</button>
                              </form>
                              </div>
                    </div>
          </div>
</body>
</html>
