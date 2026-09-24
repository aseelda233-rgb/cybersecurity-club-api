import { useEffect, useState } from 'react';

function OrderList() {
    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    useEffect(() => {
        const loadOrders = async () => {
            try {
                const response = await fetch('/api/orders');
                if (!response.ok) {
                    throw new Error('Unable to load orders.');
                }

                const payload = await response.json();
                setOrders(Array.isArray(payload.data) ? payload.data : []);
            } catch (requestError) {
                setError(requestError.message || 'Unable to load orders.');
            } finally {
                setLoading(false);
            }
        };

        loadOrders();
    }, []);

    return (
        <section className="dashboard-panel">
            <div className="panel-heading">
                <div>
                    <p className="eyebrow">Fulfillment</p>
                    <h2>Orders</h2>
                </div>
                <span className="panel-count">{orders.length}</span>
            </div>

            {loading && <p className="state-message">Loading orders...</p>}
            {error && <p className="state-message state-error">{error}</p>}
            {!loading && !error && orders.length === 0 && (
                <p className="state-message">No orders found.</p>
            )}

            {!loading && !error && orders.length > 0 && (
                <div className="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Products</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {orders.map((order) => (
                                <tr key={order.id}>
                                    <td>
                                        <span className="strong-cell">{order.Customer_Name}</span>
                                        <span className="secondary-cell">{order.Customer_Email}</span>
                                    </td>
                                    <td>{order.Date}</td>
                                    <td>
                                        <div className="product-list">
                                            {(order.products || []).map((product) => (
                                                <span key={product.id}>
                                                    {product.Name} <small>x{product.pivot?.quantity ?? 0}</small>
                                                </span>
                                            ))}
                                            {(!order.products || order.products.length === 0) && 'No products'}
                                        </div>
                                    </td>
                                    <td>${Number(order.Total || 0).toFixed(2)}</td>
                                    <td><span className="status-pill status-info">{order.Status}</span></td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            )}
        </section>
    );
}

export default OrderList;
