import React from "react";

const Comment = ({ comment }) => {
    return (
        <div key={comment.id} className="comment card mb-2">
            <div className="card-body">
                <div className="col-md-12">
                    <strong>{comment.author}</strong>
                    <span className="float-right">2 hours ago</span>
                </div>
                <div className="col-md-9">{comment.comment}</div>
            </div>
        </div>
    );
};

export default Comment;
