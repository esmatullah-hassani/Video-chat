import request from '../environment/request';
export default class ApiService{

    /**
     * get all video
     */
    getVideo(){
        return request()
            .get('/get-video')
            .then(response => response)
            .catch(errors => errors.response.data.errors);
    }

}