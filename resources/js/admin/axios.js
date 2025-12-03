import axios from 'axios'

axios.defaults.baseURL = '/'         // só um /api
axios.defaults.withCredentials = true

export default axios
