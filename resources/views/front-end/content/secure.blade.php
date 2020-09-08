@extends('front-end.master')

@section('title', 'Secure Shopping')

@section('main-content')

     <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Secure Shopping</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Secure Shopping</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

        <!--section start-->
        <section class="login-page section-b-space static-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Shopping Online</h3>
                    <h5>It’s important to take steps to protect yourself when shopping online.</h5>
                    <hr>
                    <p>From the convenience of making purchases at your fingertips and next-day delivery to getting great deals and an the endless catalogue of purchasable items, online shopping has only grown in popularity. While the increased availability of online shopping is convenient, it also makes it more lucrative for scammers to trick buyers into paying for goods they won’t receive or obtain their personal information for financial gain. So, what can you do about it?</p>
                    <p>Being a safe and secure shopper starts with STOP. THINK. CONNECT.™: Take security precautions, think about the consequences of your actions online and enjoy the conveniences of technology with peace of mind while you shop online.</p>
                    <h4>Online Shopping Tips</h4>
                    <ul>
                        <li><b>Think before you click:</b> Beware of ads encouraging users to click on links. If you receive an enticing offer, do not click on the link. Instead, go directly to the company’s website to verify the offer is legitimate.</li>
                        <li><b>Do your homework:</b> Fraudsters are fond of setting up fake e-commerce sites. Prior to making a purchase, read reviews to hear what others say about the merchant. In addition, look for a physical location and any customer service information. It’s also a good idea to call the merchant to confirm that they are legitimate.</li>
                        <li><b>Consider your payment options:</b> Using a credit card is much better than using a debit card; there are more consumer protections for credit cards if something goes awry. Or, you can use a third party payment service instead of your credit card. There are many services you can use to pay for purchases – like Google Pay — without giving the merchant your credit card information directly.</li>
                        <li><b>Watch what you give away:</b> Be alert to the kinds of information being collected to complete your transaction. If the merchant is requesting more data than you feel comfortable sharing, cancel the transaction. You only need to fill out required fields at checkout and you should not save your payment information in your profile. If the account autosaves it, after the purchase go in and delete the stored payment details. </li>
                    </ul>
                    <h4>Basic Safety and Security Tips</h4>
                    <ul>
                        <li><b>Keep a clean machine:</b> Keep a clean machine. Be sure that all internet-connected devices ‒ including PCs, smartphones and tablets ‒ are free from malware and infections by running only the most current versions of software and apps.</li>
                        <li><b>Lock Down Your Login:</b> Create long and unique passphrases for all accounts and use multi-factor authentication (MFA) wherever possible. MFA will fortify your online accounts by enabling the strongest authentication tools available, such as biometrics or a unique one-time code sent to your phone or mobile device.</li>
                        <li><b>Use a secure Wi-Fi:</b> Using public Wi-Fi to shop online while at your favorite coffee shop is tremendously convenient, but it is not cyber safe. Don’t make purchases via public Wi-Fi; instead use a Virtual Private Network (VPN) or your phone as a hotspot</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

@endsection