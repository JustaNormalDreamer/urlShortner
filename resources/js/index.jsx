import React from 'react'
import { render } from 'react-dom'
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom'

import CreateUrl from './components/Urls/create';
import ShowUrl from './components/Urls/show';

const App = () => {
    return (
        <Router>
            <Route exact path="/" component={CreateUrl} />
            <Route exact path="/urls/:url" component={ShowUrl} />
            <Switch>

            </Switch>
        </Router>
    )
}

export default App;

if(document.getElementById('app')) {
    render(
        <React.StrictMode>
            <App />
        </React.StrictMode>,
        document.getElementById('app')
    )
}
