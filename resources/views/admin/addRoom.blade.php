<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        label {
            display: inline-block;
            width: 200px;
        }
        .div_deg {
            padding-top: 30px;
        }
    </style>    
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div>
            <h1>Add Room</h1>

            <form action="{{ url('storeRoom') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="div_deg">
                <label>Room Title</label>
                <input type="text" name="title">
              </div>

              <div class="div_deg">
                <label>Description</label>
                <textarea name="description"></textarea>
              </div>

              <div class="div_deg">
                <label>Prix (par nuit)</label>
                <input type="number" step="0.01" name="prix">
              </div>

              <div class="div_deg">
                <label>Upload Image</label>
                <input type="file" name="image">
              </div>

              <div class="div_deg">
                <label>Disponibilité</label>
                <select name="disponibilite">
                  <option selected value="1">Oui</option>
                  <option value="0">Non</option>
                </select>
              </div>

              <div class="div_deg">
                <input class="btn btn-primary" type="submit" value="Add Room"/>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
