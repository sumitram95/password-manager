<div class="sweet-overlay" id="sweetbluer" tabindex="-1" style="opacity: 1.18; display: block;" onclick="fullbody();">
</div>
<div class="sweet-alert showSweetAlert visible" id="sweetbox" data-custom-class="" data-has-cancel-button="false"
    data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop"
    data-timer="null" style="display: block; margin-top: -170px;">
      <div class="sa-icon sa-info" style="display: none;"></div>
    <div class="sa-icon sa-success animate" style="display: block;">
        <span class="sa-line sa-tip animateSuccessTip"></span>
        <span class="sa-line sa-long animateSuccessLong"></span>

        <div class="sa-placeholder"></div>
        <div class="sa-fix"></div>
    </div>
    <p style="display: block;">{{session()->get('success')}}</p>
     <div class="sa-button-container">
        <div class="sa-confirm-button-container">
            <button class="confirm" tabindex="1" style="" onclick="sweetalertoff()">OK</button>
            <div class="la-ball-fall">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
