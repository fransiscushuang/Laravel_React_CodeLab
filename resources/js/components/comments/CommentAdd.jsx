import React, { useState } from "react";

const CommentAdd = props => {
    const { handleCommentSubmit } = props;
    const [comment, setComment] = useState("");
    return (
        <div>
            <div className="card mt-4 mb-3">
                <div className="card-header">
                    <strong>Comments</strong>
                </div>
                <div className="card-body">
                    <textarea
                        name="comment"
                        className="form-control"
                        placeholder="Add a new comment"
                        value={comment}
                        onChange={e => setComment(e.target.value)}
                    ></textarea>
                </div>
            </div>
            <div>
                <button
                    className="btn btn-primary mr-3"
                    onClick={() => {
                        handleCommentSubmit(comment);
                        setComment("");
                    }}
                >
                    Comment
                </button>
                <button className="btn btn-warning">Close Issue</button>
            </div>
        </div>
    );
};

export default CommentAdd;
