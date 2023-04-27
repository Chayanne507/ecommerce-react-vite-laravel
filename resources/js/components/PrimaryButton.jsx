import Spinner from "./Spinner";

export default function PrimaryButton({ className = '', disabled, children, isLoading, ...props }) {
	return (
		<button
			{...props}
			className={
				`btn-primary  ${(disabled || isLoading) && 'opacity-40'
				} ` + className
			}
			disabled={disabled}
		>
			<div className={(isLoading ? 'invisible' : 'visible')}>{children}</div>
			{isLoading && (
				<div className="absolute flex justify-center items-center inset-0">
					<Spinner />
				</div>
			)}

		</button>
	);
}
