<?php

namespace App\Data\Repositories;

use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Base Repository.
 */
class Repository
{
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
	 * Generates a fresh UUID
	 *
	 * @return UuidInterface
	 * @throws \Exception
	 */
	protected function generateUuid(): UuidInterface
	{
		return Uuid::uuid1();
	}

	/**
	 * Gets Authenticated user Object
	 *
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null|\Koboaccountant\Models\User
	 */
	protected function getAuthUser()
	{
		return Auth::user();
	}

    /**
     * Gets Authenticated user's company
     *
     * @return \Koboaccountant\Models\Company
     */
	protected function getAuthUserCompany()
    {
        return $this->getAuthUser()->company;
    }

	/**
	 * Gets Authenticated user ID
	 *
	 * @return mixed
	 */
	protected function getAuthUserId()
	{
		return $this->getAuthUser()->id;
	}

    /**
     * Returns the first record in the database.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function first()
    {
        return $this->model->first();
    }

    /**
     * Returns all the records.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    public function userAll()
    {
        return $this->model->where('user_id', auth()->id())->get();
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
	 * @param int $perPage
	 *
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 */
	public function page($perPage = 10)
	{
		return $this->model->newQuery()->paginate($perPage);
	}

    /**
     * Find a record by its identifier.
     *
     * @param string $id
     * @param array  $relations
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, $relations = null)
    {
        return $this->findBy($this->model->getKeyName(), $id, $relations);
    }

    /**
     * Find a record by an attribute.
     * Fails if no model is found.
     *
     * @param string $attribute
     * @param string $value
     * @param array  $relations
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
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
     * Find a record by an attribute.
     *
     * @param string $attribute
     * @param string $value
     * @param array  $relations
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findOnly($attribute, $value, $relations = null)
    {
        $query = $this->model->where($attribute, $value);

        if ($relations && is_array($relations)) {
            foreach ($relations as $relation) {
                $query->with($relation);
            }
        }

        return $query->first();
    }

    /**
     * @param $attribute
     * @param $value
     * @param null $relations @return array
     * @return \Illuminate\Support\Collection
     */
    public function getBy($attribute, $value, $relations = null)
    {
        $query = $this->model->where($attribute, $value);
        if ($relations && is_array($relations)) {
            foreach ($relations as $relation) {
                $query->with($relation);
            }
        }

        return $query->get();
    }

    /**
     * @param $attribute
     * @param $value
     * @param null $company_id
     * @return \Illuminate\Support\Collection
     */
    public function searchBy($attribute, $value, $company_id = null)
    {
        $query = $this->model->where($attribute, 'like', '%' . $value . '%');
        if (!is_null($company_id) && is_string($company_id)) {
            $query->where('company_id', $company_id);
        }

        return $query->get();
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
	 * @throws \Exception
	 */
    public function fill($attributes)
    {
    	$attributes['id'] = isset($attributes['id']) ? $attributes['id'] : $this->generateUuid();
        return $this->model->fill($attributes);
    }

	/**
	 * Fills out an instance of the model
	 * and saves it, pretty much like mass assignment.
	 *
	 * @param array $attributes
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 * @throws \Exception
	 */
    public function fillAndSave($attributes)
    {
	    $attributes['id'] = isset($attributes['id']) ? $attributes['id'] : $this->generateUuid();
        $this->model->fill($attributes);
        $this->model->save();

        return $this->model;
    }

    /**
     * Remove a selected record.
     *
     * @param string $key
     *
     * @return bool
     */
    public function remove($key)
    {
        return $this->model->where($this->model->getKeyName(), $key)->delete();
    }

    /**
     * Implement a convenience call to findBy
     * which allows finding by an attribute name
     * as follows: findByName or findByAlias.
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        /*
         * findBy convenience calling to be available
         * through findByName and findByTitle etc.
         */

        if (preg_match('/^findBy/', $method)) {
            $attribute = strtolower(substr($method, 6));
            array_unshift($arguments, $attribute);

            return call_user_func_array(array($this, 'findBy'), $arguments);
        }

        if (preg_match('/^getBy/', $method)) {
            $attribute = strtolower(substr($method, 5));
            array_unshift($arguments, $attribute);

            return call_user_func_array(array($this, 'getBy'), $arguments);
        }

        if (preg_match('/^searchBy/', $method)) {
            $attribute = strtolower(substr($method, 8));
            array_unshift($arguments, $attribute);

            return call_user_func_array(array($this, 'searchBy'), $arguments);
        }
    }
}
