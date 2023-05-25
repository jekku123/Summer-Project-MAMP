import { BrowserRouter, Routes, Route } from 'react-router-dom';
import './App.css';
import Home from './pages/Home';
import Layout from './pages/Layout';
import EventInfo from './pages/EventInfo';
import HelsinkiInfo from './pages/HelsinkiInfo';
import FAQ from './pages/FAQ';

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>

          <Route path='/' element={<Layout />}>
            <Route index element={<Home />} />
            <Route path='helsinkiinfo' element={<HelsinkiInfo />} />
            <Route path='faq' element={<FAQ />} />
            <Route path='event' element={<EventInfo />} />
          </Route>

        </Routes>
      </BrowserRouter>




    </div>
  );
}

export default App;
