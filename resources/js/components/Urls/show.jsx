import React, { useEffect, useState } from 'react'
import Axios from 'axios'


const ShowUrl = (props) => {
    const [url, setUrl] = useState({});

    useEffect(() => {
        Axios.get(`/api/urls/${props.match.params.url}`).then(res => setUrl(res.data.data.attributes)).catch(err => console.log(err));
    }, []);

    return (
        <div className={"container"}>
            <div className="card">
                <div className="card-header">

                </div>
                <div className="card-body">
                    <table className="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Shortner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td>{url.name}</td>
                                <td>{url.url}</td>
                                <td>{url.minify}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    )
}

export default ShowUrl;
