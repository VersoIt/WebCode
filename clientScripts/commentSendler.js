const
  contentInput = document.querySelector('#comment-input'),
  sendButton = document.querySelector('#send-comment-button');

if (contentInput)
{
  contentInput.addEventListener('input', function() {
  if (!this.value)
    {
      $(sendButton).css("background-color", "#8e8e8e");
      $(sendButton).css("cursor", "default");
      $(sendButton).attr('disabled', 'disabled');
    }
  else
  {
    $(sendButton).css("background-color", "#E06149");
    $(sendButton).css("cursor", "pointer");
    $(sendButton).removeAttr("disabled");
  }
});
}
