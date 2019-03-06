<?php
namespace Verdepieno\Core\Observer;
use Magento\Framework\Event\Observer as Ob;
use Magento\Framework\Event\ObserverInterface;
use Magento\Quote\Model\Quote as Q;
use Magento\Quote\Model\Quote\Address as QA;
use Magento\Sales\Api\Data\OrderAddressInterface as IOA;
use Magento\Sales\Model\Order as O;
use Magento\Sales\Model\Order\Address as OA;
use Verdepieno\Core\Setup\UpgradeData as D;
// 2019-03-06
// «copy custom attribute from quote_address to sales_order_address not working»
// https://magento.stackexchange.com/a/26389
final class QuoteSubmitBefore implements ObserverInterface {
	/**
	 * 2019-03-06
	 * @override
	 * @see ObserverInterface::execute()
	 * @used-by \Magento\Framework\Event\Invoker\InvokerDefault::_callObserverMethod()
	 * @param Ob $ob
	 */
	function execute(Ob $ob) {
		$o = $ob['order']; /** @var O $o */
		$q = $ob['quote']; /** @var Q $q */
		$this->p($q->getShippingAddress(), $o->getShippingAddress());
		$this->p($q->getBillingAddress(), $o->getBillingAddress());
	}

	/**
	 * 2019-03-06
	 * @used-by execute()
	 * @param QA $qa
	 * @param IOA|OA $oa
	 */
	private function p(QA $qa, IOA $oa) {
		$oa[D::F__CODICE_SDI] = $qa[D::F__CODICE_SDI];
		$oa[D::F__PEC] = $qa[D::F__PEC];
	}
}