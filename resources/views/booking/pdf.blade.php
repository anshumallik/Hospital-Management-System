<html>
<style>
    p {
        text-align: center;
    }

    hr {
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid #ccc;
        margin: 1em 0;
        padding: 0;
    }
</style>
<body>
<div class="col-md-6">
    <div>
        <h3>Doctor Information</h3>
    </div>
    <hr/>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{$booking->doctor['name']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{$booking->doctor['email']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mobile Number:</strong>
            {{$booking->doctor['phone']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Specialist:</strong>
            {{$booking->designation['name']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fees:</strong>
            {{$booking->doctor['fee']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Day:</strong>
            {{$booking->doctor['day']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Time/Schedule:</strong>
            {{$booking->doctor['time']}}
        </div>
    </div>
</div>
<div class="col-md-6">
    <div>
        <h3>Patient Information</h3>
    </div>
    <hr/>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{$booking->patient['name']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{$booking->patient['email']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mobile Number:</strong>
            {{$booking->patient['phone']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            {{$booking->patient['address']}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Booking Date:</strong>
            {{$booking->booking_date}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Time Choosen:</strong>
            {{$booking->time_choosen}}
        </div>
    </div>
</div>
<p>For Any Enquiry..</p>
<p>Contact us at kmchospital@gmail.com</p>
<p>+977 9804335248</p>
</body>
</html>