import React, { useEffect, useState } from 'react'
import TextFieldGroup from "../Form/TextFieldGroup";
import Axios from 'axios';

const CreateUrl = (props) => {
    const [name, setName] = useState("");
    const [url, setUrl] = useState("");
    const [errors, setErrors] = useState({});

    const submitHandler = e => {
        e.preventDefault();

        const urlData = {
            name, url
        }

        Axios.post('/api/urls', urlData, {
            headers: {
                'Accept': 'application/json'
            }
        }).then(res => {
            console.log('submitted')
            props.history.push(`/urls/${res.data.data.attributes.minify}`);
        })
            .catch(err => {
                console.log(err)
                setErrors(err.response.data.errors)
            });
    }

    return (
        <>
            <div className="container">
                <div className="card">
                    <div className="card-header">
                        <h3>Create a Url</h3>
                    </div>
                    <div className="card-body">
                        <form onSubmit={submitHandler}>
                            <TextFieldGroup
                                label="Url Name"
                                placeholder="Google's Image Url"
                                onChange={e => setName(e.target.value)}
                                value={name}
                                error={errors.name}
                                name="name" />

                            <TextFieldGroup
                                label="Website URL"
                                placeholder="http://google.com/images/123abc"
                                onChange={e => setUrl(e.target.value)}
                                value={url}
                                info="Please enter a url starting with http/https"
                                error={errors.url}
                                name="name" />

                                <div className="form-group">
                                    <input type="submit" value="Submit" className={"form-control btn btn-success"}/>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </>
    )
}

export default CreateUrl;
