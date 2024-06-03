<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Edit Client</title>
  </head>
<body>
  
  @include('includes.nav')

<div class="container" style="margin-left: 20px ">
  <h2>Edit Client</h2>

  <form action="{{ route('updateClients', $client->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <label for="clientName">Client name:</label><br>
    <input type="text" id="clientName" name="clientName" class="form-control" value="{{ $client->clientName }}"><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ $client->phone }}"><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}"><br><br>
    <label for="website">website:</label><br>
    <input type="text" id="website" name="website" class="form-control" value="{{ $client->website }}"><br><br>

    <label for="city">City:</label><br>
    <p style="color: red">
      @error('city')
        {{ $message }}
      @enderror
    </p>
    <select name="city" id="city" class="form-control">
      <option value="">Please Select City</option>
      <option value="Cairo" {{ $client->city == 'Cairo' ? 'selected' : '' }}>Cairo</option>
      <option value="Giza" {{ $client->city == 'Giza' ? 'selected' : '' }}>Giza</option>
      <option value="Alex" {{ $client->city == 'Alex' ? 'selected' : '' }}>Alex</option>
    </select>
    <br><br>
    <label for="active">Active:</label><br>
    <input type="checkbox" id="active" name="active" class="form-control" {{ $client->active ? 'checked' : '' }}><br><br>

    <p><img src="{{ asset('assets/images/' . $client->image)  }}" alt="" style="width: 300px"></p>
    <label for="image">Image:</label><br>
      @error('image')
        {{ $message }}
      @enderror
    <input type="file" id="image" name="image" class="form-control"><br><br>

    <input type="submit" value="Submit">
  </form> 
</div>

</body>
</html>