{{--<style>
  body {
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 20px;
    background: #f8f9fa;
    /* Light background for better readability */
  }

  .container-fluid {
    max-width: 800px;
    /* Set a max width for better layout */
    margin: auto;
    background: #fff;
    /* White background for the PDF */
    padding: 20px;
    border-radius: 8px;
    /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    /* Subtle shadow for depth */
  }

  .text-center {
    text-align: center;
  }

  .card {
    border: none;
    /* Remove default card border */
  }

  .card-body {
    padding: 20px;
  }

  h5,
  h4 {
    margin-top: 0;
    /* Remove default margin for headings */
  }

  .text-muted {
    color: #6c757d;
    /* Bootstrap muted text color */
  }

  .badge {
    padding: 0.5em 0.75em;
    border-radius: 0.25rem;
    display: inline-block;
    font-size: 0.875rem;
  }

  .badge-danger {
    background-color: #dc3545;
    /* Bootstrap red */
    color: white;
  }

  hr {
    border: 0;
    border-top: 1px solid #dee2e6;
    /* Light border for separation */
    margin: 1em 0;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    /* Collapse borders for a cleaner look */
    margin-top: 20px;
  }

  th,
  td {
    padding: 12px;
    /* Increase padding for better spacing */
    border: 1px solid #dee2e6;
    /* Light border around cells */
    text-align: left;
    /* Left align text for better readability */
  }

  th {
    background-color: #f8f9fa;
    /* Light gray background for headers */
    font-weight: bold;
  }

  .text-right {
    text-align: right;
  }

  .gd-responsive-table {
    overflow-x: auto;
    /* Allow horizontal scrolling for smaller screens */
  }

  /* Responsive adjustments */
  @media print {
    body {
      margin: 0;
      /* Remove body margin for printing */
      padding: 0;
      /* Remove padding for printing */
    }

    .container-fluid {
      box-shadow: none;
      /* Remove shadow on print */
      border-radius: 0;
      /* Remove rounded corners on print */
    }

    img {
      max-width: 100%;
      /* Ensure images are responsive */
      height: auto;
      /* Maintain aspect ratio */
    }
  }
</style>

<div class="page-content" id="printSection">
  <div class="container-fluid">
    <div class="row" style="padding: 20px">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @foreach ($invoiceUrls as $invoiceUrl)
            <div class="row">
              <div class="col-12">
                <h5><b>Invoice Details :</b></h5>
                <!-- Assuming that you have a way to fetch invoice details from the URL -->
                <!-- This could be done via a separate function or API call if needed -->
                <span class="text-muted">Invoice URL:</span> <a href="{{ $invoiceUrl }}">{{ $invoiceUrl }}</a><br>
                <!-- Add more invoice-specific details here as necessary -->
                <hr>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice Downloads</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
      margin: 0;
      padding: 20px;
      background: #f8f9fa;
      /* Light background for better readability */
    }

    .container-fluid {
      max-width: 800px;
      /* Set a max width for better layout */
      margin: auto;
      background: #fff;
      /* White background for the PDF */
      padding: 20px;
      border-radius: 8px;
      /* Rounded corners */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      /* Subtle shadow for depth */
    }

    .text-center {
      text-align: center;
    }

    .card {
      border: none;
      /* Remove default card border */
    }

    .card-body {
      padding: 20px;
    }

    h5,
    h4 {
      margin-top: 0;
      /* Remove default margin for headings */
    }

    .text-muted {
      color: #6c757d;
      /* Bootstrap muted text color */
    }

    hr {
      border: 0;
      border-top: 1px solid #dee2e6;
      /* Light border for separation */
      margin: 1em 0;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <div class="page-content" id="printSection">
    <div class="container-fluid" style="display: none">
      <div class="row" style="padding: 20px">
        <div class="col-lg-12">


          <div class="card" >
            <div class="card-body">
              <h5><b>Invoice Details :</b></h5>
              @foreach ($invoiceUrls as $invoiceUrl)
              <div class="row">
                <div class="col-12">
                  <span class="text-muted">Invoice URL:</span>
                  <a href="{{ $invoiceUrl }}">{{ $invoiceUrl }}</a><br>
                  <hr>
                </div>
              </div>
              @endforeach



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script>
    $(document).ready(function() {
    // Automatically trigger downloads when the page loads
    let invoiceUrls = @json($invoiceUrls);

    // Function to download each invoice
    function downloadInvoices() {
        let delay = 0; // Initialize delay

        invoiceUrls.forEach(function(url, index) {
            setTimeout(function() {
                const a = document.createElement('a');
                a.href = url;
                a.download = ''; // Set the download attribute
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a); // Clean up
            }, delay);

            delay += 1000; // Increase delay by 1 second for each file
        });

        // Redirect to the specified route after the last download
        setTimeout(function() {
            window.location.href = "/order";
        }, delay); 



    }

    // Call the function to start downloading
    downloadInvoices();
});
  </script>



</body>

</html>