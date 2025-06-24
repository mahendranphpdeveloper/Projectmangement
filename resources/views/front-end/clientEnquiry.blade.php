<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Clinet Details</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

<!-- Toastify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- Toastify JS -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

<!-- Semantic UI JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>

    <script nonce="f44f3cd9-ce36-4dba-85a3-0e45eb43f36c">
        try {
            (function(w, d) {
                ! function(j, k, l, m) {
                    if (j.zaraz) console.error("zaraz is loaded twice");
                    else {
                        j[l] = j[l] || {};
                        j[l].executed = [];
                        j.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        j.zaraz._v = "5796";
                        j.zaraz.q = [];
                        j.zaraz._f = function(n) {
                            return async function() {
                                var o = Array.prototype.slice.call(arguments);
                                j.zaraz.q.push({
                                    m: n,
                                    a: o
                                })
                            }
                        };
                        for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                        j.zaraz.init = () => {
                            var q = k.getElementsByTagName(m)[0],
                                r = k.createElement(m),
                                s = k.getElementsByTagName("title")[0];
                            s && (j[l].t = k.getElementsByTagName("title")[0].text);
                            j[l].x = Math.random();
                            j[l].w = j.screen.width;
                            j[l].h = j.screen.height;
                            j[l].j = j.innerHeight;
                            j[l].e = j.innerWidth;
                            j[l].l = j.location.href;
                            j[l].r = k.referrer;
                            j[l].k = j.screen.colorDepth;
                            j[l].n = k.characterSet;
                            j[l].o = (new Date).getTimezoneOffset();
                            if (j.dataLayer)
                                for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                        ...x[1],
                                        ...y[1]
                                    })), {}))) zaraz.set(w[0], w[1], {
                                    scope: "page"
                                });
                            j[l].q = [];
                            for (; j.zaraz.q.length;) {
                                const z = j.zaraz.q.shift();
                                j[l].q.push(z)
                            }
                            r.defer = !0;
                            for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C
                                .startsWith("_zaraz_"))).forEach((B => {
                                try {
                                    j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                                } catch {
                                    j[l]["z_" + B.slice(7)] = A.getItem(B)
                                }
                            }));
                            r.referrerPolicy = "origin";
                            r.src = "../../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[
                                l])));
                            q.parentNode.insertBefore(r, q)
                        };
                        ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async bv => new Promise((bw => {
                    if (bv) {
                        bv.e && bv.e.forEach((bx => {
                            try {
                                const by = d.querySelector("script[nonce]"),
                                    bz = by?.nonce || by?.getAttribute("nonce"),
                                    bA = d.createElement("script");
                                bz && (bA.nonce = bz);
                                bA.innerHTML = bx;
                                bA.onload = () => {
                                    d.head.removeChild(bA)
                                };
                                d.head.appendChild(bA)
                            } catch (bB) {
                                console.error(`Error executing script: ${bx}\n`, bB)
                            }
                        }));
                        Promise.allSettled((bv.f || []).map((bC => fetch(bC[0], bC[1]))))
                    }
                    bw()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #225acc;
    border: 1px solid #fff;
    border-radius: 4px;
    color: antiquewhite;
    display: inline-block;
    margin-left: 5px;
    margin-top: 5px;
    padding: 0;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    background-color: transparent;
    border: none;
    border-right: 1px solid #225acc;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
    color: #e9ecef;
    cursor: pointer;
    font-size: 1em;
    font-weight: bold;
    padding: 0 4px;
}
.select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
    background-color: #225acc;
    color: white;
}
.select2-container--default .select2-selection--multiple {
    background-color: #f3f3f3;
    border: none;
    border-radius: 4px;
    cursor: text;
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    padding-bottom: 8px;
    padding-right: 5px;
    padding-left: 6px;
    padding-top: 6px;
}
.row.justify-content-center.contact-box {
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    padding: 50px 20px 0px 20px;
    border-radius: 8px;
}
a.btn.btn-info.d-inline-flex.align-items-center {
    background: #225acc;
}
.btn.btn-primary {
    background: #225acc;
    color: #fff;
    padding: 15px 20px;
}
.heading span {
    background: #225acc;
    color: #fff;
}
</style>
<body>
    @if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "#4CAF50",
            }).showToast();
        });
    </script>
@endif
    <div class="content">
        <div class="container">
            <div class="row justify-content-center contact-box">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="heading mb-0">Let's talk about <span>everything!</span></h3> 
                                <a type="button" class="btn btn-info d-inline-flex align-items-center" href="{{ url('/') }}">
                                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> &nbsp;&nbsp;Enquiry
                                </a>                                
                            </div>
                            <p>We are here to help you with any questions or concerns you may have. Please feel free to reach out to us, and we will do our best to assist you promptly and efficiently.</p>

                            <p><img src="{{ asset('images/contact.gif') }}" alt="Image" class="img-fluid"></p>
                        </div>
                        
                        <div class="col-md-6">
                            <form class="mb-5" method="post" action="{{ route('clients.submit') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <select class="form-control select2" name="segment[]" id="segment" multiple="multiple" style="width: 100%;">
                                            @if($segments)
                                            @foreach ($segments as $segment)
                                                <option value="{{ $segment->name }}">{{ $segment->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="company_name" id="company_name"
                                            placeholder="Company Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="url" id="url"
                                            placeholder="Website Name or URL">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="contact_person" id="contact_person"
                                            placeholder="Contact Person Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Mail Id">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="number" class="form-control" name="phone_number" id="phone_number"
                                            placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="location" id="location"
                                            placeholder="Location">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="number" class="form-control" name="zipcode" id="zipcode"
                                            placeholder="Zip Code">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="country" id="country"
                                            placeholder="Country">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Send Message"
                                            class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>
                            <div id="form-message-warning mt-4"></div>
                            <div id="form-message-success">
                                Your message was sent, thank you!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    <!-- Semantic UI JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    
    <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select builders",
            allowClear: true
        });
    });
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"rayId":"8bdb84310dc27ea0","version":"2024.8.0","serverTiming":{"name":{"cfL4":true}},"token":"cd0b4b3a733644fc843ef0b185f98241","b":1}'
    crossorigin="anonymous"></script>
</body>

</html>
