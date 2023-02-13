<div class="modal animate__animated animate__fadeIn" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-body">
                    <div class="modal-title text-danger text-uppercase">{{ __('UNABLE TO Customize')}}</div>
                    <div class="mb-2">{{ __('Because you are activated the \'Free\' plan.')}}</div>
                    <div class="mb-2">
                        <a class="choose-plan btn btn-sm w-100" href="{{ route('user.plans') }}">{{ __('Upgrade Plan') }}</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close')}}</button>
            </div>
        </div>
    </div>
</div>
