
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hotel Reservation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>

<section class="container py-5">
  <h2 class="text-center mb-4">Hotel Reservation Form</h2>
  <form action="action2.php" method="POST" class="bg-white p-4 shadow rounded">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="room_type">Room Type</label>
        <select name="room_type" id="room_type" class="form-control">
          <option value="Deluxe">Deluxe Room</option>
          <option value="Executive">Executive Room</option>
          <option value="Suite">Suite</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label for="checkin_date">Check-In Date</label>
        <input type="text" id="checkin_date" name="checkin_date" class="form-control datepicker" autocomplete="off" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="checkout_date">Check-Out Date</label>
        <input type="text" id="checkout_date" name="checkout_date" class="form-control datepicker" autocomplete="off" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="adults">Adults</label>
        <select name="adults" id="adults" class="form-control">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4+">4+</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label for="children">Children</label>
        <select name="children" id="children" class="form-control">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2+">2+</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label for="arrival_time">Arrival Time</label>
        <input type="time" id="arrival_time" name="arrival_time" class="form-control">
      </div>
      <!-- <div class="col-md-6 mb-3">
        <label for="pickup">Need Airport Pickup?</label>
        <select name="pickup" id="pickup" class="form-control">
          <option value="No">No</option>
          <option value="Yes">Yes</option>
        </select>
      </div> -->
      <div class="col-12 mb-3">
        <label for="message">Special Requests / Notes</label>
        <textarea name="message" id="message" class="form-control" rows="4"></textarea>
      </div>
      <div class="col-12">
        <input type="submit" value="Reserve Now" name="register" class="btn btn-primary w-100">
      </div>
    </div>
  </form>
</section>

<script>
  $(function () {
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      startDate: '0d',
      autoclose: true
    });
  });
</script>
</body>
</html>
