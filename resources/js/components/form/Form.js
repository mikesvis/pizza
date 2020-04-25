import Errors from './Errors'

export default class Form {

	constructor(data) {

		this.originalData = data;

		for (let field in data){
			this[field] = data[field];
		}

		this.errors = new Errors();

	}

	/**
	 * Resets the form
	 * @return {[type]}
	 */
	reset() {

		for (let field in this.originalData){
			this[field] = '';
            this.errors.clear(field);
		}

	}

	/**
	 * Gets only needed data for sending
	 * @return {[type]}
	 */
	data() {

		let data = {};

		for(let property in this.originalData){
			data[property] = this[property];
		}

		return data;

	}

	/**
	 * Helper for post request
	 * @param  {[type]}
	 * @return {[type]}
	 */
	post(url) {
		return this.submit('POST', url);
	}

	/**
	 * Submits the request of form
	 * @requestType {string}
	 * @url  		{string}
	 * @return 		{[type]}
	 */
	submit(requestType, url) {

        return new Promise((resolve, reject) => {
            const response = fetch(url,{
                method: requestType,
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": document.head.querySelector('meta[name="csrf-token"]')
                },
                body: JSON.stringify(this.data())
            }).then(response => {
                if (!response.ok) { throw response }
                return response.json()
            }).then(json => {
                this.onSuccess(json)
                resolve(json)
            }).catch(err => {
                err.text().then(errorMessage => {
                    this.onFail(errorMessage)
                });
                reject(err);
              });
        });

	}

	/**
	 * Action on success
	 * @param  {[type]}
	 * @return {[type]}
	 */
	onSuccess(data) {

		this.reset();

	}

	/**
	 * Action on fail
	 * @param  {[type]}
	 * @return {[type]}
	 */
	onFail(errorResponse) {

		this.errors.record(JSON.parse(errorResponse).errors)

	}

}
