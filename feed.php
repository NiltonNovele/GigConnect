<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gig Application Feed</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            display: flex; /* Use flexbox for layout */
        }
        .nav {
            width: 200px; /* Fixed width for the navigation bar */
            background-color: #1e1e1e;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
        }
        .nav h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .nav ul {
            list-style-type: none;
            padding: 0;
        }
        .nav ul li {
            margin: 10px 0;
        }
        .nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        .nav ul li a:hover {
            text-decoration: underline;
        }
        .container {
            flex-grow: 1; /* Allow the container to grow and take remaining space */
            padding: 20px;
        }
        .post-form {
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .post-form textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #222;
            color: #fff;
        }
        .post-form button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
        .post {
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: background-color 0.3s;
        }
        .post:hover {
            background-color: #2c2c2c;
        }
        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .post-content {
            margin-top: 10px;
            font-size: 16px;
        }
        .post-actions {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }
        .post-actions button {
            background: none;
            color: #007bff;
            border: none;
            cursor: pointer;
        }
        .post-actions button:hover {
            text-decoration: underline;
        }
        .comment-section {
            margin-top: 10px;
            padding-left: 15px;
        }
        .comment {
            background-color: #222;
            padding: 5px;
            border-radius: 3px;
            margin-top: 5px;
        }
        .comment textarea {
            width: calc(100% - 22px);
            padding: 5px;
            margin-top: 5px;
            border-radius: 3px;
            border: 1px solid #555;
            background-color: #333;
            color: #fff;
        }
        .comment button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 5px;
            cursor: pointer;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="nav">
        <h2>Menu</h2>
        <ul>
            <li><a href="feed.php">Home</a></li>
            <li><a href="#">Search</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Messages</a></li>
            <li><a href="#">Bookmarks/Saved</a></li>
            <li><a href="#">Communities</a></li>
            <li><a href="profiles.html">Profile</a></li>
            <li><a href="#">Settings & Privacy</a></li>
        </ul>
    </div>

    <div class="container">
        <!-- Post Form -->
        <div class="post-form">
            <textarea id="postContent" placeholder="What's on your mind?" rows="3"></textarea>
            <button id="postButton">Post</button>
        </div>

        <!-- Feed Section -->
        <div id="feed"></div>
    </div>

    <script>
        const feed = document.getElementById('feed');
        const postContent = document.getElementById('postContent');
        const postButton = document.getElementById('postButton');

        // Function to create a new post
        function createPost(content) {
            const post = document.createElement('div');
            post.className = 'post';

            post.innerHTML = `
                <div class="post-header">
                    <span>User</span>
                    <span>${new Date().toLocaleString()}</span>
                </div>
                <div class="post-content">${content}</div>
                <div class="post-actions">
                    <button class="like-button">Like</button>
                    <button class="comment-button">Comment</button>
                </div>
                <div class="comment-section"></div>
            `;

            // Like functionality
            let likes = 0;
            const likeButton = post.querySelector('.like-button');
            likeButton.addEventListener('click', () => {
                likes++;
                likeButton.textContent = `Liked (${likes})`;
            });

            // Comment functionality
            const commentButton = post.querySelector('.comment-button');
            commentButton.addEventListener('click', () => {
                const commentSection = post.querySelector('.comment-section');
                const commentBox = document.createElement('div');
                commentBox.innerHTML = `
                    <textarea placeholder="Add a comment..." rows="2"></textarea>
                    <button class="comment-submit">Comment</button>
                `;
                commentSection.appendChild(commentBox);
                
                const commentSubmit = commentBox.querySelector('.comment-submit');
                commentSubmit.addEventListener('click', () => {
                    const commentText = commentBox.querySelector('textarea').value;
                    if (commentText) {
                        const comment = document.createElement('div');
                        comment.className = 'comment';
                        comment.textContent = commentText;
                        commentSection.appendChild(comment);
                        commentBox.remove(); // Remove the input box after submitting
                    }
                });
            });

            feed.prepend(post); // Add new post to the top of the feed
        }

        // Event listener for the post button
        postButton.addEventListener('click', () => {
            const content = postContent.value;
            if (content) {
                createPost(content);
                postContent.value = ''; // Clear the input field
            }
        });

        // Allow pressing Enter to post
        postContent.addEventListener('keypress', (event) => {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                postButton.click();
            }
        });
    </script>
</body>
</html>
