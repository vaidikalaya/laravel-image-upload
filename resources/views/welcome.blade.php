<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container d-flex mt-5">
        <div class="card">
            <div class="card-body">
                <form action="/upload-image" method="post" enctype="multipart/form-data">
                    @csrf
                    @error('image')
                        <div class="alert alert-danger show">{{ $message }}</div>
                    @enderror
                    <input type="file" name="image" class="form-control" required> 
                    <button class="btn btn-primary mt-2">Upload</button>
                </form>
            </div>

            @if(session('uploaded_img'))
                <div class="card-footer">
                    <div class="alert alert-success show">{{ session('success_msg') }}</div>
                    <img src="{{session('uploaded_img')}}" height="50px" width="50px">
                </div>
            @endif
            
        </div>
    </div>
    
</body>
</html>
