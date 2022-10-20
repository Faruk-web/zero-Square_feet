@extends('layouts.user.layout')
@section('title')
    <title>{{ $seo_text->title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->meta_description }}">
@endsection

@section('user-content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <!--===BREADCRUMB PART START====-->
  <section class="wsus__breadcrumb" style="background:https://www.bproperty.com/publish/images/home-loan-bg.jpg">
    <div class="wsus_bread_overlay">
        <div class="container">
            <div class="row">
                <div class="col-6 text-center">
                    <h4> Loan Calculator</h4>
                    <p>Calculate Home Loan For Properties in Bangladesh</p>
                    <nav style="--bs-breadcrumb-divider: '-';margin: 100px;" aria-label="breadcrumb">
                    </nav>
                </div>
                <div class="col-6 text-center">
                   
                    <div class="container mt-3">
                        <form>
                        <select name="cars" class="custom-select custom-select-lg mb-3">
                            <option selected>Large Custom Select Menu</option>
                            <option value="volvo">Volvo</option>
                            <option value="fiat">Fiat</option>
                            <option value="audi">Audi</option>
                            </select>
                            <select name="cars" class="custom-select custom-select-lg mb-3">
                            <option selected>Large Custom Select Menu</option>
                            <option value="volvo">Volvo</option>
                            <option value="fiat">Fiat</option>
                            <option value="audi">Audi</option>
                            </select>
                            <select name="cars" class="custom-select custom-select-lg mb-3">
                            <option selected>Large Custom Select Menu</option>
                            <option value="volvo">Volvo</option>
                            <option value="fiat">Fiat</option>
                            <option value="audi">Audi</option>
                            </select>
                                <label name="cars" class="custom-select custom-select-lg mb-3" for="customRange">Custom range</label>
                            <input type="range" class="custom-range" id="customRange" name="points1"><br>
                            <div>
                            <button type="button" class="btn btn-primary">Loan Calculation</button>
                            </div>
                        </form>
                        </div>  
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--===BREADCRUMB PART END====-->
  <!--=====BLOG START=====-->
  <section class="wsus__blog mt_45 mb_45">
    <div class="container">
        <h4>Applying For Home Loan in Bangladesh</h4>
      <div class="row">

            <div class="col-12 text-center">
                   <div class="wsus__single_blog">
                        <div class="wsus__blog_text">
                        <div class="wsus__blog_header d-flex flex-wrap align-items-center justify-content-between">
                            <div class="blog_header_images d-flex flex-wrap align-items-center w-100">
                            </div>
                        </div>
                     
                        <div class="loan-process">
                                <div class="apply-loan container">
                                    <!-- <h2>Applying For Home Loan in Bangladesh</h2> -->
                                    <div class="para">
                                        <h3>What Is A Home Loan? </h3>
                                        <p>A home loan is the credit provided by a bank, in order for an individual to buy a property. This loan can only be used for the purpose of getting a home. The loan is repaid each month, until the principal is cleared in full along with the interest. </p><br>

                                        <h3>What Are The Different Types Of Home Loans? </h3>
                                        <p>Usually, there are only fixed interest loans available, with monthly repayments on a reducing balance basis. Interest is calculated on a monthly reducing balance as opposed to an annual reducing balance. As the market develops it is likely that adjustable-rate mortgages will be possible. </p><br>

                                        <h3>How To Apply For A Home Loan? </h3>
                                        <p>In order to apply for a home loan simply call into your local bank, or call the customer care line and ask for the home loan department. Applications will then be approved at the sole discretion of the bank in question. A qualified mortgage advisor will be able to assist you in completing the application. </p><br>

                                        <h3>Documents required for home loan application? </h3>
                                        <p>The loan application is straightforward. You will need the original property title deed under your own name, property insurance covering fire, earthquakes, flood, and cyclones, and The Irrevocable General Power of Attorney (IGPA). </p><br>

                                        <h3>Can we make a joint application for the home loan? </h3>
                                        <p>Yes, joint application loans are possible, married couples will show the marriage certificate as an evidence to the bank. </p><br>

                                        <h3>How much loan I can borrow? </h3>
                                        <p>Usually it be no more than 70% of the property valuation that can be borrowed, this includes the registration cost. </p><br>

                                        <h3>What is home loan EMI and how to calculate EMI? </h3>
                                        <p>Home loan EMI (Equated Monthly Installments) is the amount you will repay each period, until the loan is cleared in full. Our home loan calculator will help you calculate much needs to be repaid. When you input the loan amount, the time period, and interest rate, the EMI or bank loan calculator provide how much you need to repay each month. </p><br>

                                        <h3>What will be my monthly EMI? </h3>
                                        <p>The monthly EMI will be the sum of the principal amount and interest, divided by the number of months, in which the loan will be repaid. A mortgage calculator can help you out with this. </p><br>

                                        <h3>Where can you get a home loans from? </h3>
                                        <p>Home loans are available from large local and international banks such as HSBC, DBH, BRAC, IFIC, DBBL and Bank One. It is also worth checking out if you qualify to get a loan from the Bangladesh House Building Finance Corporation. </p><br>

                                        <h3>What is the home loan repayment procedure? </h3>
                                        <p>Repayments are made in the form of monthly instalments. You can choose the length of the tenure, usually between 5 to 25 years. The amount will be automatically debited from your personal account. </p><br>

                                        <h3>What will be the maximum amount I will be allowed to pay during loan tenure? </h3>
                                        <p>There is usually no maximum allowed for repayment but it is worth contacting a local bank clerk about this. </p><br>

                                        <h3>Can I repay my home loan before the maturity date? </h3>
                                        <p>In most cases the bank will have a partial or early settlement facility, allowing you to pay off the loan as quickly as you desire. </p><br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    
      </div>
    </div>
  </section>
  <!--=====BLOG END=====-->
@endsection
