<?php

namespace Koboaccountant\Repositories;

use Uuid;
use Illuminate\Support\Facades\Auth;
use Koboaccountant\Traits\CashTransactions;

class
BaseRepository {

    use CashTransactions;

	/**
	 * The model instance.
	 *
	 * @var \Illuminate\Database\Eloquent\Model
	 */

	protected $model;

	public function __construct($model)
	{
		$this->model = $model;
	}

    /**
     * @return mixed
     */
    public function getAll()
    {
        $all = $this->model->where('user_id', $this->getAuthUserId())->get();
        return $all;
    }


    public function generateUuid()
    {
        return Uuid::generate(5,str_random(5), Uuid::NS_DNS)->string;
    }

		/**
	 * Returns the count of all the records.
	 *
	 * @return int
	 */
	public function count()
	{
		return $this->model->count();
	}

		/**
	 * Returns a range of records bounded by pagination parameters.
	 *
	 * @param int    $limit
	 * @param int    $offset
	 *
	 * @param array  $relations
	 * @param string $orderBy
	 * @param string $sorting
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function page($limit = 10, $offset = 0, array $relations = [], $orderBy = 'updated_at', $sorting = 'desc')
	{
		return $this->model->with($relations)->take($limit)->skip($offset)->orderBy($orderBy, $sorting)->get();
	}

    public function slugIt($text)
    {
        return str_replace('--', '-', strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', trim($text))));  
    }

	protected function getAuthUserId()
	{
		return Auth::user()->id;
	}

	public function getAuthCompanyId()
	{
		$user = Auth::user()->company()->pluck('user_id');
        $result = substr($user, 2);
        $result = rtrim($result, '"]"');
        return $result;
	}


    public function findBy($attribute, $value, $relations = null)
	{
		$query = $this->model->where($attribute, $value);
		if ($relations && is_array($relations)) {
			foreach ($relations as $relation) {
				$query->with($relation);
			}
		}
		return $query->firstOrFail();
    }
    
    	/**
	 * Get all records by an associative array of attributes.
	 * Two operators values are handled: AND | OR.
	 *
	 * @param array  $attributes
	 * @param string $operator
	 * @param array  $relations
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function getByAttributes(array $attributes, $operator = 'AND', $relations = null)
	{
		// In the following it doesn't matter with element to start with, in all cases all attributes will be appended to the
		// builder.
		// Get the last value of the associative array
		$lastValue = end($attributes);
		// Get the last key of the associative array
		$lastKey = key($attributes);
		// Builder
		$query = $this->model->where($lastKey, $lastValue);
		// Pop the last key value pair of the associative array now that it has been added to Builder already
		array_pop($attributes);
		$method = 'where';
		if (strtoupper($operator) === 'OR') {
			$method = 'orWhere';
		}
		foreach ($attributes as $key => $value) {
			$query->$method($key, $value);
		}
		if ($relations && is_array($relations)) {
			foreach ($relations as $relation) {
				$query->with($relation);
			}
		}
		return $query->get();
	}
	
		/**
	 * Fills out an instance of the model
	 * with $attributes.
	 *
	 * @param array $attributes
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 * @throws
	 */
	public function fill($attributes)
	{
		$attributes['id'] = $this->generateUuid();
		return $this->model->fill($attributes);
	}

	/**
	 * Fills out an instance of the model
	 * and saves it, pretty much like mass assignment.
	 *
	 * @param array $attributes
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 * @throws
	 */
	public function fillAndSave($attributes)
	{
		$attributes['id'] = $this->generateUuid();
		$this->model->fill($attributes);
		$this->model->save();
		return $this->model;
	}
}
