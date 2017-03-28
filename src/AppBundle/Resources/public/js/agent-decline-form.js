var agentDeclineFormValidation = {
    init: function() {
        $('form[name=agent_decline]').submit(function (e) {
            var url = window.location.pathname;

            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function(data)
                {
                    if(data.status == 'success') {
                        agentDeclineFormValidation.showMessage('success', 'Reason submitted successfully.');
                        $('#declineForm').hide();
                        return;
                    }

                    if(data.status == 'failed') {
                        var message = data.message.join('<br/>');
                        agentDeclineFormValidation.showMessage('danger', message);
                    }
                }
            });
            e.preventDefault();
        });

        $('input[name="agent_decline[reason]"]').change(function() {
            agentDeclineFormValidation.otherFieldToggle($(this));
        });

        agentDeclineFormValidation.otherFieldToggle();
    },
    showMessage: function(type, message) {
        $('#message')
            .hide()
            .removeClass('alert-success')
            .removeClass('alert-danger')
            .addClass('alert-' + type)
            .html(message)
            .show()
        ;
    },
    otherFieldToggle: function(field) {
        agentDeclineFormValidation.declineNoticeField.toggle(
            $(field).val() == 'other'
        );
    },
    declineNoticeField: $('#agent_decline_notice').parent()
};