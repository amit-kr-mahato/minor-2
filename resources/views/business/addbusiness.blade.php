@extends('layouts.app')

@section('content')
    <div class="cint">
        <div class="container mt-5" style="width: 1000px;height:1300px; ">
            <div class=" row">
                <div class="col-md-6 me-5">
                    <h2 class="fw-bold">Add Your Business</h2>
                    <p class="text-muted">Add information about your business below. Your business page will not appear in
                        search results until this information has been verified and approved by our moderators. Once it is
                        approved, you'll receive an email with instructions on how to claim your business page.</p>
                    <form action="{{route('business.business_store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="country" class="form-label">Province <span class="required-star">*</span></label>
                            <select class="form-select" id="country" name="province">
                                <option value="" disabled selected>Select a Province</option>
                                <option value="Janakpur">Janakpur</option>
                                <option value="Bagmati">Bagmati</option>
                                <option value="Sudurpashchim">Sudurpashchim</option>
                                <option value="Lumbini">Lumbini</option>
                                <option value="Koshi">Koshi</option>
                                <option value="Karnali">Karnali</option>
                                <option value="Gandaki">Gandaki</option>
                            </select>
                            <div class="error" id="error-country"></div>
                        </div>
                        <div class="mb-3">
                            <form action="#" method="POST">
                                  @csrf
                            <label for="businessName" class="form-label">Business Name <span
                                    class="required-star">*</span></label>
                            <input type="text" class="form-control" id="businessName" name="business_name"  value="{{ old('business_name', $business_name ?? '') }}" 
                                placeholder="business name">
                            <div class="error" id="error-businessName"></div>
                            </form>
                        </div>
                        <div class="mb-3">
                            <label for="address1" class="form-label">Address 1 <span class="required-star">*</span></label>
                            <input type="text" class="form-control" id="address1" name="address1">
                            <div class="error" id="error-address1"></div>
                        </div>
                        <div class="mb-3">
                            <label for="address2" class="form-label">Address 2</label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Optional">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City <span class="required-star">*</span></label>
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="Eg:kathmandu,Pokhara, Lalitpur, Bharatpur, and Biratnagar">
                                <div class="error" id="error-city"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postalCode" class="form-label">Postal Code <span
                                        class="required-star">*</span></label>
                                <input type="text" class="form-control" id="postalCode" name="postal_code"
                                    placeholder="Eg:47500">
                                <div class="error" id="error-postalCode"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone <span class="required-star">*</span></label>
                            <input type="tel" class="form-control" name="phone" oninput="getvalue()" id="phone"
                                placeholder="Eg:124-1456780">
                            <div class="error" id="error-phone"></div>
                        </div>
                        <div class="mb-3">
                            <label for="webAddress" class="form-label">Web Address</label>
                            <input type="url" class="form-control" oninput="getvalue()" id="webAddress" name="web_address"
                                placeholder="http://www.companyaddress.my,Option">

                        </div>
                        <div class="form-group mb-3">
                            <label for="category">Categories <span class="required-star">*</span></label>
                            <div id="category-container">
                                <div class="d-flex align-items-center mb-2 category-group">
                                    <select class="form-control category-select me-2" name="categories[]" required>
                                        <option value="">Select Category</option>
                                        <option value="Food">Food</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Services">Services</option>
                                    </select>
                                    <a href="#" class="text-danger remove-category"
                                        onclick="event.preventDefault(); this.closest('.category-group').remove();">Remove</a>
                                </div>
                            </div>
                            <a href="#" id="moreButton" onclick="addCategory(event)">+ Add another category</a>


                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fs-2"> Your Email Address <span
                                    class="required-star">*</span></label>
                            <p>We'll send you an email to verify your address</p>
                            <input type="text" class="form-control" name="email" oninput="getvalues()" id="email"
                                placeholder="email">
                            <div class="error" id="error-email"></div>
                        </div>

                        <div class="mb-3">
                            <p>By continuing, you agree to Bizzlisto <span class="text-primary">Business Terms</span> and
                                acknowledge our <span class="text-primary">Privacy Policy.</span> We may email you about
                                Bizlisto products, services and local events. You can unsubscribe at any time</p>

                        </div>
                        <button type="submit" onclick="validateForm()" class="btn btn-danger fw-bold">Add business</button>



                    </form>
                    @if(session('success'))
                        <script>
                            toastr.success("{{ session('success') }}");
                        </script>
                    @endif
                </div>
                <div class="col-md-4 mb-6">
                    <img src="https://s3-media0.fl.yelpcdn.com/assets/2/biz/img/cfd2f4c2e0b3/signup/new_biz.png" alt="">
                </div>

            </div>
        </div>
    </div>
@endsection