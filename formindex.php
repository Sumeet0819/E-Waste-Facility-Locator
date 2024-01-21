<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/formstyle.css">
  <title>E-waste Pickup Form</title>
</head>
<body>
  <section id="ewaste-form" class="ewaste-form">
    <div class="container">
      <div class="form-container">
        <h2>E-waste Pickup Request</h2>
        <form action="submit.php" method="post" class="ewaste-form">
          <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="phone">Your Phone:</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required>
          </div>
          <div class="form-group">
            <label for="address">Pickup Address:</label>
            <textarea name="address" id="address" class="form-control" placeholder="Enter your pickup address" rows="4" required></textarea>
          </div>
          <div class="form-group">
            <label for="ewaste-type">Type of E-waste:</label>
            <select class="form-control" name="ewaste-type" id="ewaste-type" required>
              <option value="Laptops">Laptops</option>
              <option value="Mobile Phones">Mobile Phones</option>
              <option value="Printers">Printers</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="file">Upload an Image of E-waste (optional):</label>
            <input type="file" name="file" id="file" class="form-control">
          </div>
          <div class="text-center">
            <button type="submit">Submit Request</button>
          </div>
        </form>
      </div>
    </div>
  </section>

</body>
</html>