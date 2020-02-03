@if (config('larafeed.enabled') && ! app()->request->is(config('larafeed.ignore_paths', [])))

    <link rel="stylesheet" href="{{ asset('vendor/larafeed/css/larafeed.css') }}">
    <script src="{{ asset('vendor/larafeed/js/html2canvas.min.js') }}"></script>

    <style>{!! config('larafeed.feedback.custom_css', '') !!}</style>

    <button type="button"
            class="larabtn larafeed_button_blue larafeed_button">
        {!! config('larafeed.button.title', '&#9993; Feedback') !!}
    </button>

    <style>
        .larafeed_button {
        {{larafeedButtonCSS()}};
            bottom: {{config('larafeed.button.y_margin', '25px')}};
        }
    </style>

    <!-- Modal -->
    <div class="larafeed_modal">
        <form id="feedback_form" action="{{route('larafeed_store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="larafeed_modal_content">
                <div class="larafeed_modal_title">
                    <strong>{!! config('larafeed.feedback.feedback_dialog_text', '') !!}</strong>
                </div>

                <div class="larafeed_field">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        class="larafeed_control"
                        name="name"
                        id="name"
                        value="{{larafeedUser()->name}}"
                        required>
                </div>
                <div class="larafeed_field">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        class="larafeed_control"
                        name="email"
                        id="email"
                        value="{{larafeedUser()->email}}"
                        required>
                </div>
                <div class="larafeed_field">
                    <label for="message">Message</label>
                    <textarea
                        class="larafeed_control"
                        name="message"
                        id="message"
                        style="height: 130px;"
                        required
                    ></textarea>
                </div>

                <input type="hidden" name="ip" value="{{request()->ip()}}">
                <input type="hidden" name="uri" value="{{request()->fullUrl()}}">
                <input type="hidden" name="screenshot" id="screenshot" value="">

                <div class="pull-right">
                    <button type="button" class="larabtn larafeed_button_close">Close</button>
                    <button
                        type="submit"
                        id="feedback_submit"
                        class="larabtn larafeed_button_blue">Send Feedback
                    </button>
                </div>
                <div class="clear"></div>

            </div>
        </form>
    </div>
    <!-- /Modal -->

    <script>
        var modal = document.querySelector(".larafeed_modal");

        function toggleModal(callback) {
            modal.classList.toggle("larafeed_show_modal");

            if (callback && typeof callback === 'function') {
                callback();
            }
        }

        document.querySelector(".larafeed_button_close").addEventListener("click", toggleModal);
        document.querySelector(".larafeed_button").addEventListener("click", toggleModal);

        document.addEventListener("click", function (event) {
            if (event.target === modal) {
                toggleModal();
            }
        });

        document.querySelector("#feedback_form").addEventListener("submit", function (event) {
            var $this = this;
            event.preventDefault();

            document.querySelector("#feedback_submit").disabled = true;

            toggleModal(function () {
               setTimeout(function () {
                   html2canvas(document.querySelector("{{config('larafeed.screenshots.screenshot_selector', 'body')}}")).then(canvas => {
                       document.querySelector("#screenshot").value = canvas.toDataURL("image/png");
                       $this.submit();
                   });
               }, 250);
            });
        });
    </script>

@endif
