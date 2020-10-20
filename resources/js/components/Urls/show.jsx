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
                                <th>Redirected Times</th>
                                <th>View</th>
                                <th>View with Redirect</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td>{url.name}</td>
                                <td>{url.url}</td>
                                <td>{url.minify}</td>
                                <td>{url.redirected}</td>
                                <td><a href={url.url} className={"btn btn-info"}>View</a></td>
                                <td><a href={`/redirect/${url.minify}`} className={"btn btn-info"}>View Redirect</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    )
}

export default ShowUrl;
