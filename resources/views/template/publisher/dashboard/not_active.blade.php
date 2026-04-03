<div class="contents  mt-5">
    <div class="row">
        <div class="col-lg-12">
            @if(auth()->user()->status == \App\Models\User::PENDING)
                <div class="alert-icon-big alert alert-danger " role="alert">
                    <div class="alert-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    </div>
                    <div class="alert-content">
                        <h3 class="alert-heading">Announcement</h3>
                        <p>Hello There,</p>
                        <p class="mt-3">Your application to join LinksCircle Affiliate Network was submitted to our Compliance Department for review.</p>
                        <p class="mt-3">For security reasons, your account status is Pending. Rest assured; Your Account Manager will reach out to you shortly with further information.</p>
                        <p class="mt-3">We will notify you once your Account gets approved.</p>
                        <p class="mt-3">Thanks,</p>
                        <p>LinksCircle Support</p>
                    </div>
                </div>
            @elseif(auth()->user()->status == \App\Models\User::HOLD)
                <div class="alert-icon-big alert alert-danger " role="alert">
                    <div class="alert-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    </div>
                    <div class="alert-content">
                        <h3 class="alert-heading">Announcement</h3>
                        <p>Your account is currently HOLD. Please contact the support team of LinksCircle to better understand the issue.</p>
                    </div>
                </div>
            @elseif(auth()->user()->status == \App\Models\User::REJECTED)
                <div class="alert-icon-big alert alert-danger " role="alert">
                    <div class="alert-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    </div>
                    <div class="alert-content">
                        <h3 class="alert-heading">Announcement</h3>
                        <p>Your account is currently Rejected. Please contact the support team of LinksCircle to better understand the issue.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
