<!DOCTYPE html>
<html>
  <head> 
    @php use Illuminate\Support\Str; @endphp

    @include('admin.css')
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            text-align: center;
            margin: 30px 0 10px;
        }

        .table_container {
            margin: 20px auto;
            width: 95%;
            overflow-x: auto;
        }

        .table_style {
            width: 100%;
            border-collapse: collapse;
            background-color: #1e1e1e;
            color: #ffffff;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .table_style th,
        .table_style td {
            padding: 14px;
            border-bottom: 1px solid #333;
            text-align: center;
        }

        .table_style th {
            background-color: #2c2c2c;
            font-weight: bold;
        }

        .table_style tr:hover {
            background-color: #333333;
        }

        img {
            border-radius: 5px;
            max-height: 60px;
        }

        .action-btn {
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-right: 6px;
            transition: background 0.25s, transform 0.2s;
            display: inline-block;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        .btn-update {
            background-color: #f1c40f;
            color: #000;
        }

        .btn-update:hover {
            background-color: #d4ac0d;
            transform: scale(1.05);
        }

        .btn-add {
            background-color: #2ecc71;
            color: white;
        }

        .btn-add:hover {
            background-color: #27ae60;
            transform: scale(1.05);
        }

        .top-actions {
            text-align: right;
            width: 95%;
            margin: auto;
            margin-bottom: 10px;
        }

        @media screen and (max-width: 768px) {
            .table_style th,
            .table_style td {
                padding: 10px;
                font-size: 12px;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>Liste des chambres</h1>

          <div class="top-actions">
            <a href="{{ url('addRoom') }}" class="action-btn btn-add">➕</a>
          </div>

          <div class="table_container">
            <table class="table_style">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Prix</th>
                  <th>Image</th>
                  <th>Disponibilité</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $data)
                <tr>
                  <td>{{ $data->title }}</td>
                  <td>{{ Str::limit($data->description, 250) }}</td>
                  <td>{{ $data->prix }} TND</td>
                  <td><img src="{{ asset('room/' . $data->image) }}" alt="Room Image"></td>
                  <td>{{ $data->disponibilite ? 'Oui' : 'Non' }}</td>
                  <td>
                    <a onclick="return confirm('Êtes-vous sûre ?')" 
                       class="action-btn btn-delete" 
                       href="{{ url('deleteRoom', $data->id) }}">
                       🗑 
                    </a>

                    <a class="action-btn btn-update" 
                       href="{{ url('updateRoom', $data->id) }}">
                       ✏️ 
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
