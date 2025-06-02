<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style type="text/css">
    body {
      background: #181818;
      font-family: 'Segoe UI', Arial, sans-serif;
    }
    .category-container {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      justify-content: center;
      align-items: flex-start;
      margin-top: 40px;
    }
    .category-form-card {
      background: #111;
      border-radius: 18px;
      box-shadow: 0 4px 32px rgba(44,62,80,0.18);
      padding: 40px 30px 30px 30px;
      max-width: 400px;
      min-width: 320px;
      margin-bottom: 30px;
    }
    .h2_font {
      font-size: 2.2rem;
      font-weight: 700;
      color: #fff;
      padding-bottom: 30px;
      letter-spacing: 1px;
      margin-top: 10px;
      text-align: center;
    }
    .input_color {
      width: 100%;
      padding: 10px 14px;
      border-radius: 8px;
      border: 1px solid #333;
      font-size: 1rem;
      background: #222;
      color: #fff;
      transition: border 0.2s;
      margin-bottom: 15px;
    }
    .input_color:focus {
      border: 1.5px solid #3498db;
      outline: none;
      background: #181818;
    }
    label {
      display: block;
      font-weight: 600;
      color: #eee;
      margin-bottom: 7px;
      font-size: 1.05rem;
    }
    .btn-primary {
      background: #3498db;
      color: #fff;
      border: none;
      border-radius: 25px;
      padding: 10px 32px;
      font-weight: 600;
      font-size: 1.1rem;
      transition: background 0.2s;
      margin-top: 10px;
    }
    .btn-primary:hover {
      background: #217dbb;
    }
    .category-table-card {
      background: #111;
      border-radius: 18px;
      box-shadow: 0 4px 32px rgba(44,62,80,0.18);
      padding: 30px 20px 20px 20px;
      min-width: 350px;
      max-width: 700px;
      overflow-x: auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 1rem;
      background: #111;
    }
    th, td {
      padding: 12px 10px;
      border-bottom: 1px solid #333;
      color: #eee;
      vertical-align: middle;
      text-align: center;
    }
    th {
      background: #222;
      color: #fff;
      font-weight: 600;
      letter-spacing: 0.5px;
    }
    tr:last-child td {
      border-bottom: none;
    }
    .btn-danger, .btn-primary {
      border-radius: 20px;
      font-weight: 600;
      padding: 7px 18px;
      font-size: 0.98rem;
      transition: background 0.2s, color 0.2s;
    }
    .btn-danger {
      background: #e74c3c;
      color: #fff;
      border: none;
    }
    .btn-danger:hover {
      background: #c0392b;
    }
    .category-image {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(44,62,80,0.08);
      border: 1px solid #333;
      background: #222;
    }
    @media (max-width: 900px) {
      .category-container {
        flex-direction: column;
        align-items: center;
      }
      .category-form-card, .category-table-card {
        min-width: 98vw;
        max-width: 98vw;
        padding: 18px 5px 18px 5px;
      }
      th, td {
        font-size: 0.95rem;
        padding: 8px 4px;
      }
      .category-image {
        width: 40px;
        height: 40px;
      }
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.header')
        <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

        @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>

        @endif

        <div class="category-container">
          <div class="category-form-card">
            <h2 class="h2_font">Add Catagory</h2>
            <form action="{{url('/add_catagory')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="catagory">Catagory Name</label>
              <input class="input_color" type="text" name="catagory" placeholder="Write catagory name" required>
              <label for="image">Category Image</label>
              <input type="file" name="image" class="input_color" accept="image/*">
              <button type="submit" class="btn btn-primary" name="submit">Add Catagory</button>
            </form>
          </div>
          <div class="category-table-card">
            <table>
              <tr>
                <th>Catagory Name</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              @foreach($data as $data)
              <tr>
                <td>{{$data->catagory_name}}</td>
                <td>
                  @if($data->image)
                    <img src="{{ asset('storage/category/'.$data->image) }}" class="category-image">
                  @else
                    <span style="color:#aaa;">No Image</span>
                  @endif
                </td>
                <td>
                  <a class="btn btn-primary" href="{{url('edit_catagory',$data->id)}}">Edit</a>
                  <a onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">Delete</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>