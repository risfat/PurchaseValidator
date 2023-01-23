<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/payment.css') }}" />
<style>
    ul li {
        font-size: 13.5px;
    }

</style>

<article class="card">
    <div class="container">
        <form method="POST" action="{{ route('process.payment') }}">
            @csrf
            <div class="card-title">
                <h2>Payment For {{ $payment_for }}</h2>
            </div>
                @if (Session::has('success'))

                <div class="success-msg">
                    <i class="fa fa-check"></i>
                    {{ Session::get('success') }}
                </div>
                <br>
                <br>
                @endif

                @if ($errors->any())

                    <div class="error-msg">
                        <i class="fa fa-times-circle"></i>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    <br>
                    <br>
                @endif
            <div class="card-body">
                <div class="payment-type">
                    <h4>Choose payment method below</h4>
                    <div class="types flex justify-space-between">
                        <div class="type" id="nagad">
                            <div class="logo">
                                <img src="{{ asset('images/payments/nagad.svg') }}" width="80" height="80" />
                            </div>
                            <div class="text">
                                <p>Pay with Nagad</p>
                            </div>
                        </div>
                        <div class="type selected" id="bkash">
                            <div class="logo">
                                <img src="{{ asset('images/payments/bkash.svg') }}" width="80" height="80" />
                            </div>
                            <div class="text">
                                <p>Pay with Bkash</p>
                            </div>
                        </div>
                        <div class="type" id="rocket">
                            <div class="logo">
                                <img src="{{ asset('images/payments/rocket.svg') }}" width="80" height="80" />
                            </div>
                            <div class="text">
                                <p>Pay with Rocket</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-info flex justify-space-between">
                    <div class="column billing">
                        <div class="title">
                            <div class="num">1</div>
                            <h4>Payment Process</h4>
                        </div>

                        <ul class="list">
                            <h4> Step 1: </h4>

                            <li> প্রথমে উপরে দেওয়া নাম্বার কপি করুণ। </li>

                            <li>(bKash,Nagad,Rocket) App অথাবা Ussd কোডের মধ্যেমে

                                সেন্ড মানি অপশন সিলেক্ট করুণ। </li>

                            <li> {{ $payment_for }}'s Payment নাম্বার (_) প্রবেশ করুণ। </li>

                            <li> এম্যাউন্ট অর্থাৎ কত টাকা যোগ করবেন তার পরিমাণ প্রবেশ করুণ। </li>

                            <li> রেফারেন্স নম্বর হিসাবে '{{ $payment_for }}' লিখুন। </li>

                            <li> আপনার বিকাশ পিন নাম্বার প্রবেশ করুণ। </li>

                            <h4> Step 2:</h4>

                            <li> নিচে যে তিনটি বক্স দেখতে পারছেন প্রথম বক্সে আপনার নাম লিখুন। </li>
                            <li> দ্বিতীয় বক্সে আপনার ইমেইল লিখুন (যদি থাকে)।</li>
                            <li> তৃতীয় বক্সে আপনি যে নাম্বার থেকে টাকা পাঠিয়েছেন সেই নাম্বারটি লিখুন। </li>
                            <li> চতুর্থ বক্সে কত টাকা পাঠিয়েছেন সেটা লিখুন </li>
                            <li> পঞ্চম বক্সে লেনদেন নাম্বার (Transaction ID) লিখুন। </li>
                            <li> তারপর Proceed অপশনে ক্লিক করুণ। </li>
                        </ul>

                        <br><br><br>

                    </div>

                    <div class="column shipping">
                        <div class="title">
                            <div class="num">2</div>
                            <h4>Payment Account Info</h4>
                        </div>

                        <div class="field full">
                            <label id="payment-label" for="payment">Bkash Number</label>
                            <div class="ct">
                                <div id="inviteCode" class="invite-page">
                                    <input id="link" value="01737757944" readonly>
                                    <div id="copy">
                                        <i class="fas fa-paste" aria-hidden="true" data-copytarget="#link"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="field full">
                            <label for="name">Name</label>
                            <input id="name" name="payer_name" type="text" placeholder="Enter Your Name" required>
                        </div>

                        <div class="field full">
                            <label for="email">Email (if any)</label>
                            <input id="email" name="payer_email" type="email" placeholder="Enter Your Email Address (if any)">
                        </div>

                        <div class="field full">
                            <label for="number">Sender Number</label>
                            <input id="number" name="account_number" type="tel" placeholder="Enter Sender Bkash Number" required>
                        </div>
                        <div class="flex justify-space-between">
                            <div class="field half">
                                <label for="amount">Amount (৳)</label>
                                <input name="amount" type="number"
                                    placeholder="Enter Amount">
                            </div>
                            <div class="field half">
                                <p id="amount-label" style="text-align:center; font-size:12px; margin-top:30px;">
                                    (Including Bkash 1.85% Charge)</p>
                            </div>
                        </div>
                        <div class="field full">
                            <label for="trx">Transaction ID</label>
                            <input id="trx" name="trx_id" type="text" placeholder="Enter Your Transaction ID" required>
                        </div>

                        <input name="payment_for" value="{{ $payment_for }}" type="hidden">
                    </div>
                </div>
            </div>

            <input id="payment-method" type="hidden" name="payment_method" value="bkash">

            <div class="card-actions flex justify-space-between">
                <div class="flex-start">
                    <button onclick="backFunc()" class="button button-secondary">Return</button>
                </div>
                <div class="flex-end">

                    <a href="mailto:risfat.bd@gmail.com" target="_blank" class="button button-link">Issues with the payment ?</a>

                    <button type="submit" class="button button-primary">Proceed</button>
                </div>
            </div>

        </form>
    </div>
</article>
<footer>
    Payment Gateway Developed By <a href="https://devtech365.com" target="_blank">DevTech365.com</a>
</footer>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>
    // const type = document.querySelector(".type");

    // type.onclick = function() {

    //     type.classList.toggle("selected");



    // }

    function backFunc() {
        window.history.back();
    }




    // Get all buttons with class="btn" inside the container
    var typs = document.getElementsByClassName("type");
    console.log(typs);


    var bkash = document.getElementById("bkash");
    var rocket = document.getElementById("rocket");
    var nagad = document.getElementById("nagad");


    bkash.addEventListener("click", function() {
        document.getElementById("link").value = "01737757944";
        document.getElementById("payment-label").innerHTML = "Bkash Number";
        document.getElementById("amount-label").innerHTML = "(Including Bkash 1.85% Charge)";
        document.getElementById("number").placeholder = "Enter Sender Bkash Number";
        document.getElementById("payment-method").value = "bkash";

    });

    rocket.addEventListener("click", function() {
        document.getElementById("link").value = "01737757944";
        document.getElementById("payment-label").innerHTML = "Rocket Number";
        document.getElementById("amount-label").innerHTML = "(Including Rocket 1.80% Charge)";
        document.getElementById("number").placeholder = "Enter Sender Rocket Number";
        document.getElementById("payment-method").value = "rocket";
    });

    nagad.addEventListener("click", function() {
        document.getElementById("link").value = "01737757944";
        document.getElementById("payment-label").innerHTML = "Nagad Number";
        document.getElementById("amount-label").innerHTML = "(Including Nagad 1.30% Charge)";
        document.getElementById("number").placeholder = "Enter Sender Nagad Number";
        document.getElementById("payment-method").value = "nagad";
    });

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < typs.length; i++) {
        typs[i].onclick = function() {
            var current = document.getElementsByClassName("type selected");
            // console.log(current);
            current[0].className = current[0].className.replace(" selected", "");
            this.className += " selected";
        }
    }
</script>

<script>
    // functionality to copy text from inviteCode to clipboard

    // trigger copy event on click
    $('#copy').on('click', function(event) {
        console.log(event);
        copyToClipboard(event);
    });

    // event handler
    function copyToClipboard(e) {
        // alert('this function was triggered');
        // find target element
        var
            t = e.target,
            c = t.dataset.copytarget,
            inp = (c ? document.querySelector(c) : null);
        console.log(inp);
        // check if input element exist and if it's selectable
        if (inp && inp.select) {
            // select text
            inp.select();
            try {
                // copy text
                document.execCommand('copy');
                inp.blur();

                // copied animation
                t.classList.add('copied');
                setTimeout(function() {
                    t.classList.remove('copied');
                }, 1500);
            } catch (err) {
                //fallback in case exexCommand doesnt work
                alert('please press Ctrl/Cmd+C to copy');
            }

        }

    }
</script>
