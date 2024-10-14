document.getElementById('chat-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');

    if (chatInput.value.trim()) {
        const message = document.createElement('div');
        message.textContent = chatInput.value;
        chatMessages.appendChild(message);
        chatInput.value = '';
    }
});


function focusBox(selectedBox) {
    // Get all boxes
    const boxes = document.querySelectorAll('.about-box');
    
    // Remove the 'focused' class from all boxes and apply blur effect
    boxes.forEach(box => {
        box.classList.remove('focused');
    });

    // Add 'focused' class to the selected box
    selectedBox.classList.add('focused');
}
