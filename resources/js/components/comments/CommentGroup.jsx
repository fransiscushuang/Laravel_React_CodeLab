import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

import CommentAdd from "./CommentAdd";
import Comment from "./Comment";

const CommentGroup = () => {
    let arrUrl = window.location.href.split("/");
    let mStoryId = arrUrl[arrUrl.length - 1];

    const [storyId] = useState(mStoryId);

    const [comments, setComments] = useState([
        {
            id: 1,
            author: "Fransiscus",
            comment: "This is my first comment"
        },
        {
            id: 2,
            author: "Fransiscus",
            comment: "This is my second comment"
        }
    ]);

    const handleCommentSubmit = async comment => {
        const postData = {
            comment,
            storyId
        };

        const res = await axios.post("/api/comment/save", postData);
        console.log(res.data);
        let temp = [...comments];
        temp.unshift({
            id: comments.length + 1,
            author: "Fransiscus",
            comment: res.data.comment
        });
        setComments(temp);
    };

    const renderComments = () => {
        return comments.map(comment => {
            return <Comment key={comment.id} comment={comment}></Comment>;
        });
    };

    return (
        <div>
            {renderComments()}
            <CommentAdd handleCommentSubmit={handleCommentSubmit} />
        </div>
    );
};

export default CommentGroup;

if (document.getElementById("comments-wrapper")) {
    ReactDOM.render(
        <CommentGroup />,
        document.getElementById("comments-wrapper")
    );
}
