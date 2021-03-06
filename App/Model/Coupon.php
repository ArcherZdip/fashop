<?php
/**
 * 优惠券数据模型
 *
 *
 *
 *
 * @copyright  Copyright (c) 2019 MoJiKeJi Inc. (http://www.fashop.cn)
 * @license    http://www.fashop.cn
 * @link       http://www.fashop.cn
 * @since      File available since Release v1.1
 */

namespace App\Model;



class Coupon extends Model
{
	protected $softDelete = true;
	protected $jsonFields = ['partake'];

	/**
	 * @param array  $condition
	 * @param string $field
	 * @param string $order
	 * @param array  $page
	 * @return array|bool|false|null
	 */
	public function getCouponList( $condition = [], $field = '*', $order = 'id desc', $page = [1, 20] )
	{
		$data = $this->where( $condition )->order( $order )->field( $field )->page( $page )->select();
		return $data;
	}


	/**
	 * 查询普通的数据和软删除的数据
	 * @return
	 */
	public function getWithTrashedCouponList( $condition = [], $field = '*', $order = 'id desc', $page = [1, 20] )
	{
		$data = $this->withTrashed()->where( $condition )->order( $order )->field( $field )->page( $page )->select();  //查询普通的数据和软删除的数据
		return $data;
	}

	/**
	 * 只查询软删除的数据
	 * @return
	 */
	public function getOnlyTrashedCouponList( $condition = [], $field = '*', $order = 'id desc', $page = [1, 20] )
	{
		$data = $this->onlyTrashed()->where( $condition )->order( $order )->field( $field )->page( $page )->select(); //只查询软删除的
		return $data;
	}

	/**
	 * 获得数量
	 * @param   $condition
	 * @param   $field
	 * @return
	 */
	public function getCouponCount( $condition = [] )
	{
		return $this->where( $condition )->count();
	}

	/**
	 * 获得信息
	 * @param   $condition
	 * @param   $field
	 * @return
	 */
	public function getCouponInfo( $condition = [], $field = '*' )
	{
		$data = $this->where( $condition )->field( $field )->find();
		return $data;
	}

	/**
	 * 修改数据
	 * @param   $update
	 * @param   $condition
	 * @return
	 */
	public function editCoupon( $condition = [], $update = [] )
	{
		return $this->where( $condition )->edit( $update );
	}

	/**
	 * 修改多条数据
	 *
	 * @param array $update 数据
	 */
	public function editMultiCoupon( $update )
	{
		return $this->editMulti( $update );
	}

	/**
	 * 加入单条数据
	 *
	 * @param array $insert 数据
	 */
	public function addCoupon( array $data )
	{
		return $this->add( $data );
	}

	/**
	 * 加入多条数据
	 *
	 * @param array $insert 数据
	 */
	public function insertAllCoupon( $insert )
	{
		return $this->addMulti( $insert );
	}

	/**
	 * 删除
	 *
	 * @param array $insert 数据
	 */
	public function delCoupon( $condition )
	{
		return $this->where( $condition )->del();
	}

	/**
	 * 获取的id
	 * @param   $condition
	 * @return
	 */
	public function getCouponId( $condition )
	{
		return $this->where( $condition )->value( 'id' );
	}

	/**
	 * 获取的某个字段
	 * @param   $condition
	 * @return
	 */
	public function getCouponValue( $condition, $field )
	{
		return $this->where( $condition )->value( $field );
	}

	/**
	 * 获取的某个字段列
	 * @param   $condition
	 * @return
	 */
	public function getCouponColumn( $condition, $field )
	{
		return $this->where( $condition )->column( $field );
	}

	/**
	 * 获取的某个字段+1
	 * @param   $condition
	 * @return
	 */
	public function setIncCoupon( $condition, $field, $num )
	{
		return $this->where( $condition )->setInc( $field, $num );
	}

	/**
	 * 获取的某个字段+1
	 * @param   $condition
	 * @return
	 */
	public function setDecCoupon( $condition, $field, $num )
	{
		return $this->where( $condition )->setDec( $field, $num );
	}
}
