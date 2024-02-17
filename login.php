<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="assets/plugins/bootstrap-5.2.3/css/bootstrap.min.css">
   <style>
      .background-radial-gradient {
         background-color: hsl(218, 41%, 15%);
         /* background-image: url('assets/img/bg.jpg'); */
         background-image: radial-gradient(650px circle at 0% 0%,
               hsl(218, 41%, 35%) 15%,
               hsl(218, 41%, 30%) 35%,
               hsl(218, 41%, 20%) 75%,
               hsl(218, 41%, 19%) 80%,
               transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
               hsl(218, 41%, 45%) 15%,
               hsl(218, 41%, 30%) 35%,
               hsl(218, 41%, 20%) 75%,
               hsl(218, 41%, 19%) 80%,
               transparent 100%);
      }

      #radius-shape-1 {
         height: 220px;
         width: 220px;
         top: -60px;
         left: -130px;
         background: radial-gradient(#44006b, #ad1fff);
         overflow: hidden;
      }

      #radius-shape-2 {
         border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
         bottom: -60px;
         right: -110px;
         width: 300px;
         height: 300px;
         background: radial-gradient(#44006b, #ad1fff);
         overflow: hidden;
      }

      .bg-glass {
         background-color: hsla(0, 0%, 100%, 0.9) !important;
         backdrop-filter: saturate(200%) blur(25px);
      }
   </style>
</head>

<body>
   <section class="background-radial-gradient overflow-hidden vh-100">
      <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
         <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-7 mb-5 mb-lg-0" style="z-index: 10">
               <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                  Aplikasi Penjualan Pulsa <br />
                  <span style="color: hsl(218, 81%, 75%)">ELTIPonsel Palangka Raya</span>
               </h1>
               <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                  Ini adalah aplikasi rekap penjualan pulsa dengan beberapa fitur laporan export ke excel dan ke pdf.
               </p>
            </div>

            <div class="col-lg-5 mb-5 mb-lg-0 position-relative py-4">
               <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
               <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
               <div class="card bg-glass">
                  <div class="card-body px-4 py-5 px-md-5">
                     <h3 class="mb-5 text-center">LOGIN APLIAKSI</h3>
                     <form action="proses_login.php" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                           <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" />
                           <label class="form-label" for="email">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                           <input type="password" name="passwrod" id="password" class="form-control" placeholder="Masukkan password" />
                           <label class="form-label" for="password">Password</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary btn-block mb-5">
                           Login
                        </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Section: Design Block -->

   <script src="assets/plugins/bootstrap-5.2.3/js/bootstrap.bundle.js"></script>
</body>

</html>