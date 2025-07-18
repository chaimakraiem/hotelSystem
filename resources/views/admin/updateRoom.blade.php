<!DOCTYPE html>
<html>
  <head> 
   <base href="/public">
    @include('admin.css')
    <style>
        label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
        }
        .div_deg {
            padding-top: 20px;
        }
        img {
            max-height: 100px;
            border-radius: 5px;
        }
    </style>    
  </head>

  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>Modifier une chambre</h1>

          <form action="{{ url('upRoom', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="div_deg">
              <label>Room Title</label>
              <input type="text" name="title" value="{{ $data->title }}">
            </div>

            <div class="div_deg">
              <label>Description</label>
              <textarea name="description" rows="4">{{ $data->description }}</textarea>
            </div>

            <div class="div_deg">
              <label>Prix (par nuit)</label>
              <input type="number" step="0.01" name="prix" value="{{ $data->prix }}">
            </div>

            <div class="div_deg">
              <label>Image actuelle</label><br>
              <img src="/room/{{ $data->image }}" alt="Room Image">
            </div>

            <div class="div_deg">
              <label>Changer l'image</label>
              <input type="file" name="image">
            </div>

           <div class="div_deg">
            <label>Disponibilité</label>
            <select name="disponibilite" required>
                <option value="1" {{ $data->disponibilite == 1 ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ $data->disponibilite == 0 ? 'selected' : '' }}>Non</option>
            </select>
            </div>

            <div class="div_deg">
              <input class="btn btn-primary" type="submit" value="updateRoom">
            </div>
          </form>

        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
