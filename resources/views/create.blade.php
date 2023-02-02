<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Product</h3>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type="text" name="title">
        <input type="text" name="description">
        <input type="file" name="images[]" multiple>
        <button>Create</button>
    </form>
    <br/>
    <h3>Post</h3>
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type="text" name="title">
        <input type="text" name="content">
        <input type="file" name="images[]" multiple>
        <button>Create</button>
    </form>
</body>
</html>
