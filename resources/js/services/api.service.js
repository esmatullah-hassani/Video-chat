import request from '../environment/request';
export default class ApiService{

    /**
     * Log out user
     */
    logoutUser(){
        return request()
            .get('/logout')
            .then(response => response)
            .catch(errors => errors.response.data.errors);
    }

    getVideo(){
        alert("hello");
    }
}